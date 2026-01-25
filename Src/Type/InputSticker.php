<?php

declare(strict_types=1);

namespace Makhnanov\TelegramBot\Type;

readonly class InputSticker
{
    public function __construct(
        public string $sticker,
        public string $format,
        public array $emojiList,
        public ?MaskPosition $maskPosition = null,
        public ?array $keywords = null,
    ) {}

    public static function fromArray(array $data): self
    {
        return new self(
            sticker: $data['sticker'],
            format: $data['format'],
            emojiList: $data['emoji_list'],
            maskPosition: isset($data['mask_position']) ? MaskPosition::fromArray($data['mask_position']) : null,
            keywords: $data['keywords'] ?? null,
        );
    }
}
