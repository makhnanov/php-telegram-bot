<?php

declare(strict_types=1);

namespace Makhnanov\TelegramBot\Type;

readonly class InputStoryContentVideo
{
    public function __construct(
        public string $type,
        public string $video,
        public ?float $duration = null,
        public ?float $coverFrameTimestamp = null,
        public ?bool $isAnimation = null,
    ) {}

    public static function fromArray(array $data): self
    {
        return new self(
            type: $data['type'],
            video: $data['video'],
            duration: $data['duration'] ?? null,
            coverFrameTimestamp: $data['cover_frame_timestamp'] ?? null,
            isAnimation: $data['is_animation'] ?? null,
        );
    }
}
