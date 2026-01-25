<?php

declare(strict_types=1);

namespace Makhnanov\TelegramBot\Type;

readonly class Video
{
    public function __construct(
        public string $fileId,
        public string $fileUniqueId,
        public int $width,
        public int $height,
        public int $duration,
        public ?PhotoSize $thumbnail = null,
        public ?array $cover = null,
        public ?int $startTimestamp = null,
        public ?string $fileName = null,
        public ?string $mimeType = null,
        public ?int $fileSize = null,
    ) {}

    public static function fromArray(array $data): self
    {
        return new self(
            fileId: $data['file_id'],
            fileUniqueId: $data['file_unique_id'],
            width: $data['width'],
            height: $data['height'],
            duration: $data['duration'],
            thumbnail: isset($data['thumbnail']) ? PhotoSize::fromArray($data['thumbnail']) : null,
            cover: isset($data['cover']) ? array_map(PhotoSize::fromArray(...), $data['cover']) : null,
            startTimestamp: $data['start_timestamp'] ?? null,
            fileName: $data['file_name'] ?? null,
            mimeType: $data['mime_type'] ?? null,
            fileSize: $data['file_size'] ?? null,
        );
    }
}
