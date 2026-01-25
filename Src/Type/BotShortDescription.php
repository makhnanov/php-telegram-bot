<?php

declare(strict_types=1);

namespace Makhnanov\TelegramBot\Type;

readonly class BotShortDescription
{
    public function __construct(
        public string $shortDescription,
    ) {}

    public static function fromArray(array $data): self
    {
        return new self(
            shortDescription: $data['short_description'],
        );
    }
}
