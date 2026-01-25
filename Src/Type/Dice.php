<?php

declare(strict_types=1);

namespace Makhnanov\TelegramBot\Type;

readonly class Dice
{
    public function __construct(
        public string $emoji,
        public int $value,
    ) {}

    public static function fromArray(array $data): self
    {
        return new self(
            emoji: $data['emoji'],
            value: $data['value'],
        );
    }
}
