<?php

declare(strict_types=1);

namespace Makhnanov\TelegramBot\Type;

readonly class ForumTopicClosed
{
    public function __construct(
        public ?string $name = null,
        public ?string $iconCustomEmojiId = null,
    ) {}

    public static function fromArray(array $data): self
    {
        return new self(
            name: $data['name'] ?? null,
            iconCustomEmojiId: $data['icon_custom_emoji_id'] ?? null,
        );
    }
}
