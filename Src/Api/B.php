<?php

namespace Makhnanov\Telegram81\Api;

use Stringable;

/**
 * Alias for @see Bot::class
 */
final class B extends Bot
{
    private static self $instance;

    protected function __construct(
        private null|string|Stringable $token = null,
        private null|string|Stringable $baseUri = 'https://api.telegram.org',
        private ?int                   $timeout = null,
    ) {

    }

    public function instance(
        null|string|Stringable $token = null,
        null|string|Stringable $baseUri = 'https://api.telegram.org',
        ?int                   $timeout = null,
    ): self {
        return self::$instance ?? self::$instance = new self(...func_get_args());
    }
}
