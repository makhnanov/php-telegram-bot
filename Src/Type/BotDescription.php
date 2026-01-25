<?php

declare(strict_types=1);

namespace Makhnanov\TelegramBot\Type;

readonly class BotDescription
{
    public function __construct(
        public string $description,
    ) {}

    public static function fromArray(array $data): self
    {
        return new self(
            description: $data['description'],
        );
    }
}
