<?php

declare(strict_types=1);

namespace Makhnanov\TelegramBot\Type;

readonly class WebAppInfo
{
    public function __construct(
        public string $url,
    ) {}

    public static function fromArray(array $data): self
    {
        return new self(
            url: $data['url'],
        );
    }
}
