<?php

declare(strict_types=1);

namespace Makhnanov\TelegramBot\Type;

readonly class MaskPosition
{
    public function __construct(
        public string $point,
        public float $xShift,
        public float $yShift,
        public float $scale,
    ) {}

    public static function fromArray(array $data): self
    {
        return new self(
            point: $data['point'],
            xShift: $data['x_shift'],
            yShift: $data['y_shift'],
            scale: $data['scale'],
        );
    }
}
