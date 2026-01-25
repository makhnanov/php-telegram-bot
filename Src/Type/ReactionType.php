<?php

declare(strict_types=1);

namespace Makhnanov\TelegramBot\Type;

readonly class ReactionType
{
    public function __construct(
        public string $type,
        public string $emoji,
    ) {}

    public static function fromArray(array $data): self
    {
        return new self(
            type: $data['type'],
            emoji: $data['emoji'],
        );
    }
}
