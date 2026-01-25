<?php

declare(strict_types=1);

namespace Makhnanov\TelegramBot\Type;

readonly class BackgroundFillFreeformGradient
{
    public function __construct(
        public string $type,
        public array $colors,
    ) {}

    public static function fromArray(array $data): self
    {
        return new self(
            type: $data['type'],
            colors: $data['colors'],
        );
    }
}
