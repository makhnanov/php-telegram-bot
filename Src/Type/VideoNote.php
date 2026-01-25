<?php

declare(strict_types=1);

namespace Makhnanov\TelegramBot\Type;

readonly class VideoNote
{
    public function __construct(
        public string $fileId,
        public string $fileUniqueId,
        public int $length,
        public int $duration,
        public ?PhotoSize $thumbnail = null,
        public ?int $fileSize = null,
    ) {}

    public static function fromArray(array $data): self
    {
        return new self(
            fileId: $data['file_id'],
            fileUniqueId: $data['file_unique_id'],
            length: $data['length'],
            duration: $data['duration'],
            thumbnail: isset($data['thumbnail']) ? PhotoSize::fromArray($data['thumbnail']) : null,
            fileSize: $data['file_size'] ?? null,
        );
    }
}
