<?php

declare(strict_types=1);

namespace Makhnanov\TelegramBot\Type;

readonly class BackgroundFillGradient
{
    public function __construct(
        public string $type,
        public int $topColor,
        public int $bottomColor,
        public int $rotationAngle,
    ) {}

    public static function fromArray(array $data): self
    {
        return new self(
            type: $data['type'],
            topColor: $data['top_color'],
            bottomColor: $data['bottom_color'],
            rotationAngle: $data['rotation_angle'],
        );
    }
}
