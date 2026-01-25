<?php

declare(strict_types=1);

namespace Makhnanov\TelegramBot\Type;

readonly class StoryAreaPosition
{
    public function __construct(
        public float $xPercentage,
        public float $yPercentage,
        public float $widthPercentage,
        public float $heightPercentage,
        public float $rotationAngle,
        public float $cornerRadiusPercentage,
    ) {}

    public static function fromArray(array $data): self
    {
        return new self(
            xPercentage: $data['x_percentage'],
            yPercentage: $data['y_percentage'],
            widthPercentage: $data['width_percentage'],
            heightPercentage: $data['height_percentage'],
            rotationAngle: $data['rotation_angle'],
            cornerRadiusPercentage: $data['corner_radius_percentage'],
        );
    }
}
