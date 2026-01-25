<?php

declare(strict_types=1);

namespace Makhnanov\TelegramBot\Type;

readonly class BackgroundTypeFill
{
    public function __construct(
        public string $type,
        public BackgroundFill $fill,
        public int $darkThemeDimming,
    ) {}

    public static function fromArray(array $data): self
    {
        return new self(
            type: $data['type'],
            fill: BackgroundFill::fromArray($data['fill']),
            darkThemeDimming: $data['dark_theme_dimming'],
        );
    }
}
