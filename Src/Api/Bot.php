<?php
declare(strict_types=1);

namespace Makhnanov\Telegram81\Api;

use GuzzleHttp\Client;
use GuzzleHttp\Psr7\Response;
use JetBrains\PhpStorm\Immutable;
use Makhnanov\Telegram81\Api\Enumeration\HttpMethod;
use Makhnanov\Telegram81\Api\Method\Edit\EditMessageTextTrait;
use Makhnanov\Telegram81\Api\Method\Get\GetMeTrait;
use Makhnanov\Telegram81\Api\Method\Get\GetUpdatesTrait;
use Makhnanov\Telegram81\Api\Method\Send\SendMessageTrait;
use Makhnanov\Telegram81\Helper\Reflection;
use Stringable;

/**
 * Main class for use Telegram API for bot.
 */
#[Immutable(Immutable::PROTECTED_WRITE_SCOPE)]
class Bot
{
    public const STD_LONG_POOLING_TIMEOUT = 6;

    use Reflection,
        GetMeTrait,
        SendMessageTrait,
        GetUpdatesTrait,
        EditMessageTextTrait;

    public bool $async = false;

    public HttpMethod $defaultHttpMethod = HttpMethod::Post;

    protected Client $client;

    private int $getUpdatesOffset;

    public function __construct(
        private string|Stringable $token,
        private string|Stringable $baseUri = 'https://api.telegram.org',
        private ?int              $timeout = null,
    ) {
        $this->client = new Client([
            'base_uri' => "$this->baseUri/bot$this->token/",
            'timeout' => $this->timeout ?? self::STD_LONG_POOLING_TIMEOUT + 5
        ]);
        $this->getUpdatesOffset = $this->getOffset();
    }

    public function getOffset(): int
    {
        return 0;
    }

    public function getClient(): Client
    {
        return $this->client;
    }

    public function setClient(Client $client): self
    {
        $this->client = $client;
        return $this;
    }

    public function getResponse($uri, array $parameters = []): Response
    {
        /**
         * @see Client::get()
         * @see Client::getAsync()
         * @see Client::post()
         * @see Client::postAsync()
         */
        $parameters = array_filter($parameters, 'Makhnanov\Telegram81\is_set');
        if ($this->defaultHttpMethod === HttpMethod::Get) {
            $method = 'get';
            if ($parameters) {
                $uri .= '?' . http_build_query($parameters);
            }
        } else {
            $method = 'post';
            $options = ['form_params' => $parameters];
        }
        if ($this->async) {
            $method .= 'Async';
        }
        return call_user_func_array([$this->client, $method], [$uri, $options ?? []]);
    }
}
