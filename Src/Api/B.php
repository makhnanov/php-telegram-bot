<?php

namespace Makhnanov\TelegramBot\Api;

use Stringable;

/**
 * Alias for @see Bot::class
 */
final class B extends Bot
{
    private static self $single;

    protected function __construct(
        null|string|Stringable $token = null,
        null|string|Stringable $baseUri = 'https://api.telegram.org',
        ?int                   $timeout = null,
    ) {
        parent::__construct(
            $token,
            $baseUri,
            $timeout,
        );
    }

    public static function api(
        null|string|Stringable $token = null,
        null|string|Stringable $baseUri = 'https://api.telegram.org',
        ?int                   $timeout = null,
    ): self {
        return self::$single ?? self::$single = new self(...func_get_args());
    }
}
