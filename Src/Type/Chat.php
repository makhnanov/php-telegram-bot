<?php

declare(strict_types=1);

namespace Makhnanov\TelegramBot\Type;

readonly class Chat
{
    public function __construct(
        public int $id,
        public string $type,
        public ?string $title = null,
        public ?string $username = null,
        public ?string $firstName = null,
        public ?string $lastName = null,
        public ?bool $isForum = null,
        public ?bool $isDirectMessages = null,
    ) {}

    public static function fromArray(array $data): self
    {
        return new self(
            id: $data['id'],
            type: $data['type'],
            title: $data['title'] ?? null,
            username: $data['username'] ?? null,
            firstName: $data['first_name'] ?? null,
            lastName: $data['last_name'] ?? null,
            isForum: $data['is_forum'] ?? null,
            isDirectMessages: $data['is_direct_messages'] ?? null,
        );
    }
}
