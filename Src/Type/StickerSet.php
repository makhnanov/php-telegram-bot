<?php

declare(strict_types=1);

namespace Makhnanov\TelegramBot\Type;

readonly class StickerSet
{
    public function __construct(
        public string $name,
        public string $title,
        public string $stickerType,
        public array $stickers,
        public ?PhotoSize $thumbnail = null,
    ) {}

    public static function fromArray(array $data): self
    {
        return new self(
            name: $data['name'],
            title: $data['title'],
            stickerType: $data['sticker_type'],
            stickers: array_map(Sticker::fromArray(...), $data['stickers']),
            thumbnail: isset($data['thumbnail']) ? PhotoSize::fromArray($data['thumbnail']) : null,
        );
    }
}
