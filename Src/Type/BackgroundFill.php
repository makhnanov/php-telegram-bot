<?php

declare(strict_types=1);

namespace Makhnanov\TelegramBot\Type;

readonly class BackgroundFill
{
    public function __construct(
        public string $type,
        public int $color,
    ) {}

    public static function fromArray(array $data): self
    {
        return new self(
            type: $data['type'],
            color: $data['color'],
        );
    }
}
