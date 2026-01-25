<?php

declare(strict_types=1);

namespace Makhnanov\TelegramBot\Type;

readonly class MessageEntity
{
    public function __construct(
        public string $type,
        public int $offset,
        public int $length,
        public ?string $url = null,
        public ?User $user = null,
        public ?string $language = null,
        public ?string $customEmojiId = null,
    ) {}

    public static function fromArray(array $data): self
    {
        return new self(
            type: $data['type'],
            offset: $data['offset'],
            length: $data['length'],
            url: $data['url'] ?? null,
            user: isset($data['user']) ? User::fromArray($data['user']) : null,
            language: $data['language'] ?? null,
            customEmojiId: $data['custom_emoji_id'] ?? null,
        );
    }
}
