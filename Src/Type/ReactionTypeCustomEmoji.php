<?php

declare(strict_types=1);

namespace Makhnanov\TelegramBot\Type;

readonly class ReactionTypeCustomEmoji
{
    public function __construct(
        public string $type,
        public string $customEmojiId,
    ) {}

    public static function fromArray(array $data): self
    {
        return new self(
            type: $data['type'],
            customEmojiId: $data['custom_emoji_id'],
        );
    }
}
