<?php

declare(strict_types=1);

namespace Makhnanov\TelegramBot\Type;

readonly class ForumTopic
{
    public function __construct(
        public int $messageThreadId,
        public string $name,
        public int $iconColor,
        public ?string $iconCustomEmojiId = null,
        public ?bool $isNameImplicit = null,
    ) {}

    public static function fromArray(array $data): self
    {
        return new self(
            messageThreadId: $data['message_thread_id'],
            name: $data['name'],
            iconColor: $data['icon_color'],
            iconCustomEmojiId: $data['icon_custom_emoji_id'] ?? null,
            isNameImplicit: $data['is_name_implicit'] ?? null,
        );
    }
}
