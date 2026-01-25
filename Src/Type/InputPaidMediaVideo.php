<?php

declare(strict_types=1);

namespace Makhnanov\TelegramBot\Type;

readonly class InputPaidMediaVideo
{
    public function __construct(
        public string $type,
        public string $media,
        public ?string $thumbnail = null,
        public ?string $cover = null,
        public ?int $startTimestamp = null,
        public ?int $width = null,
        public ?int $height = null,
        public ?int $duration = null,
        public ?bool $supportsStreaming = null,
    ) {}

    public static function fromArray(array $data): self
    {
        return new self(
            type: $data['type'],
            media: $data['media'],
            thumbnail: $data['thumbnail'] ?? null,
            cover: $data['cover'] ?? null,
            startTimestamp: $data['start_timestamp'] ?? null,
            width: $data['width'] ?? null,
            height: $data['height'] ?? null,
            duration: $data['duration'] ?? null,
            supportsStreaming: $data['supports_streaming'] ?? null,
        );
    }
}
