<?php

declare(strict_types=1);

namespace Makhnanov\TelegramBot\Type;

readonly class BotName
{
    public function __construct(
        public string $name,
    ) {}

    public static function fromArray(array $data): self
    {
        return new self(
            name: $data['name'],
        );
    }
}
