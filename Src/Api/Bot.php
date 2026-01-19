<?php

declare(strict_types=1);

namespace Makhnanov\TelegramBot\Api;

use GuzzleHttp\Client;
use GuzzleHttp\Psr7\Response;
use GuzzleHttp\RequestOptions;
use JetBrains\PhpStorm\Immutable;
use Makhnanov\TelegramBot\Api\Enumeration\HttpMethod;
use Makhnanov\TelegramBot\Api\Method\DeleteMessageTrait;
use Makhnanov\TelegramBot\Api\Method\Edit\EditMessageCaptionTrait;
use Makhnanov\TelegramBot\Api\Method\Edit\EditMessageMediaTrait;
use Makhnanov\TelegramBot\Api\Method\Edit\EditMessageReplyMarkupTrait;
use Makhnanov\TelegramBot\Api\Method\Edit\EditMessageTextTrait;
use Makhnanov\TelegramBot\Api\Method\Get\GetMeTrait;
use Makhnanov\TelegramBot\Api\Method\Get\GetUpdatesTrait;
use Makhnanov\TelegramBot\Api\Method\Send\SendMessageTrait;
use Makhnanov\TelegramBot\Api\Method\Send\SendPhotoTrait;
use Makhnanov\TelegramBot\Helper\Reflection;
use Stringable;

/**
 * Main class for use Telegram API for bot.
 */
#[Immutable(Immutable::PROTECTED_WRITE_SCOPE)]
class Bot
{
    public const PROD_LONG_POOLING_TIMEOUT = 60;
    public const DEV_LONG_POOLING_TIMEOUT = 5;
    public const STD_LONG_POOLING_TIMEOUT = self::PROD_LONG_POOLING_TIMEOUT;

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

    private int $getUpdatesOffset = 0;

    public function __construct(
        private null|string|Stringable $token = null,
        private null|string|Stringable $baseUri = 'https://api.telegram.org',
        private ?int                   $timeout = null,
    ) {
        $this->setClient(new Client([
            RequestOptions::TIMEOUT => $this->timeout ?? self::STD_LONG_POOLING_TIMEOUT + 5
        ]));
    }

    public function setToken(string $token): self
    {
        $this->token = $token;
        return $this;
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

    public function setBaseUri(string $baseUri): self
    {
        $this->baseUri = $baseUri;
        return $this;
    }

    public function getBaseUri(): string
    {
        return $this->baseUri;
    }

    public function getResponse($uri, array $parameters = [], $options = []): Response
    {
        /**
         * @see Client::get()
         * @see Client::getAsync()
         * @see Client::post()
         * @see Client::postAsync()
         */
        $parameters = array_filter($parameters, 'Makhnanov\TelegramBot\is_set');
        if ($this->defaultHttpMethod === HttpMethod::Get) {
            $method = 'get';
            if ($parameters) {
                $uri .= '?' . http_build_query($parameters);
            }
        } else {
            $method = 'post';
            $options = ['form_params' => $parameters, ...$options];
        }
        if ($this->async) {
            $method .= 'Async';
        }

        return call_user_func_array([$this->client, $method], [
            $this->getBaseUri() . '/bot' . $this->token . '/' . $uri, $options
        ]);
    }
}
