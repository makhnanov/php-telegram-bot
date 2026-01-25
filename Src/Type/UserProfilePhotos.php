<?php

declare(strict_types=1);

namespace Makhnanov\TelegramBot\Type;

readonly class UserProfilePhotos
{
    public function __construct(
        public int $totalCount,
        public array $photos,
    ) {}

    public static function fromArray(array $data): self
    {
        return new self(
            totalCount: $data['total_count'],
            photos: array_map(fn($row) => array_map(PhotoSize::fromArray(...), $row), $data['photos']),
        );
    }
}
