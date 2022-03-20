<?php
declare(strict_types=1);

namespace Makhnanov\Telegram81\Api;

use GuzzleHttp\Client;
use GuzzleHttp\Psr7\Response;
use JetBrains\PhpStorm\Immutable;
use Makhnanov\Telegram81\Api\Enumeration\HttpMethod;
use Makhnanov\Telegram81\Api\Method\DeleteMessageTrait;
use Makhnanov\Telegram81\Api\Method\Edit\EditMessageCaptionTrait;
use Makhnanov\Telegram81\Api\Method\Edit\EditMessageMediaTrait;
use Makhnanov\Telegram81\Api\Method\Edit\EditMessageReplyMarkupTrait;
use Makhnanov\Telegram81\Api\Method\Edit\EditMessageTextTrait;
use Makhnanov\Telegram81\Api\Method\Get\GetMeTrait;
use Makhnanov\Telegram81\Api\Method\Get\GetUpdatesTrait;
use Makhnanov\Telegram81\Api\Method\Send\SendMessageTrait;
use Makhnanov\Telegram81\Api\Method\Send\SendPhotoTrait;
use Makhnanov\Telegram81\Helper\Reflection;
use Stringable;

/**
 * Main class for use Telegram API for bot.
 */
#[Immutable(Immutable::PROTECTED_WRITE_SCOPE)]
class Bot
{
    use Reflection,
        GetMeTrait,
        SendMessageTrait,
        GetUpdatesTrait,
        EditMessageTextTrait,
        SendPhotoTrait,
        EditMessageMediaTrait,
        EditMessageCaptionTrait,
        EditMessageReplyMarkupTrait,
        DeleteMessageTrait;

    public bool $async = false;

    public HttpMethod $defaultHttpMethod = HttpMethod::Post;

    protected Client $client;

    private int $getUpdatesOffset;

    public function __construct(
        public readonly string|Stringable $token,
        public readonly string|Stringable $baseUri = 'https://api.telegram.org',
        public readonly ?int              $timeout = 60,
    ) {
        $this->client = new Client([
            'base_uri' => "$this->baseUri/bot$this->token/",
            'timeout' => $this->timeout
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
        /** @noinspection SpellCheckingInspection */
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
