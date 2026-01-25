<?php

declare(strict_types=1);

namespace Makhnanov\TelegramBot\Type;

readonly class InputProfilePhotoAnimated
{
    public function __construct(
        public string $type,
        public string $animation,
        public ?float $mainFrameTimestamp = null,
    ) {}

    public static function fromArray(array $data): self
    {
        return new self(
            type: $data['type'],
            animation: $data['animation'],
            mainFrameTimestamp: $data['main_frame_timestamp'] ?? null,
        );
    }
}
