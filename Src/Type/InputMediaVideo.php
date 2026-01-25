<?php

declare(strict_types=1);

namespace Makhnanov\TelegramBot\Type;

readonly class InputMediaVideo
{
    public function __construct(
        public string $type,
        public string $media,
        public ?string $thumbnail = null,
        public ?string $cover = null,
        public ?int $startTimestamp = null,
        public ?string $caption = null,
        public ?string $parseMode = null,
        public ?array $captionEntities = null,
        public ?bool $showCaptionAboveMedia = null,
        public ?int $width = null,
        public ?int $height = null,
        public ?int $duration = null,
        public ?bool $supportsStreaming = null,
        public ?bool $hasSpoiler = null,
    ) {}

    public static function fromArray(array $data): self
    {
        return new self(
            type: $data['type'],
            media: $data['media'],
            thumbnail: $data['thumbnail'] ?? null,
            cover: $data['cover'] ?? null,
            startTimestamp: $data['start_timestamp'] ?? null,
            caption: $data['caption'] ?? null,
            parseMode: $data['parse_mode'] ?? null,
            captionEntities: isset($data['caption_entities']) ? array_map(MessageEntity::fromArray(...), $data['caption_entities']) : null,
            showCaptionAboveMedia: $data['show_caption_above_media'] ?? null,
            width: $data['width'] ?? null,
            height: $data['height'] ?? null,
            duration: $data['duration'] ?? null,
            supportsStreaming: $data['supports_streaming'] ?? null,
            hasSpoiler: $data['has_spoiler'] ?? null,
        );
    }
}
