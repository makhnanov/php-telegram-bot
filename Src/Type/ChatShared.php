<?php

declare(strict_types=1);

namespace Makhnanov\TelegramBot\Type;

readonly class ChatShared
{
    public function __construct(
        public int $requestId,
        public int $chatId,
        public ?string $title = null,
        public ?string $username = null,
        public ?array $photo = null,
    ) {}

    public static function fromArray(array $data): self
    {
        return new self(
            requestId: $data['request_id'],
            chatId: $data['chat_id'],
            title: $data['title'] ?? null,
            username: $data['username'] ?? null,
            photo: isset($data['photo']) ? array_map(PhotoSize::fromArray(...), $data['photo']) : null,
        );
    }
}
