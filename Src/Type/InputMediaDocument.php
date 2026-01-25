<?php

declare(strict_types=1);

namespace Makhnanov\TelegramBot\Type;

readonly class InputMediaDocument
{
    public function __construct(
        public string $type,
        public string $media,
        public ?string $thumbnail = null,
        public ?string $caption = null,
        public ?string $parseMode = null,
        public ?array $captionEntities = null,
        public ?bool $disableContentTypeDetection = null,
    ) {}

    public static function fromArray(array $data): self
    {
        return new self(
            type: $data['type'],
            media: $data['media'],
            thumbnail: $data['thumbnail'] ?? null,
            caption: $data['caption'] ?? null,
            parseMode: $data['parse_mode'] ?? null,
            captionEntities: isset($data['caption_entities']) ? array_map(MessageEntity::fromArray(...), $data['caption_entities']) : null,
            disableContentTypeDetection: $data['disable_content_type_detection'] ?? null,
        );
    }
}
