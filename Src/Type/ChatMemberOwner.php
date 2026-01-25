<?php

declare(strict_types=1);

namespace Makhnanov\TelegramBot\Type;

readonly class ChatMemberOwner
{
    public function __construct(
        public string $status,
        public User $user,
        public bool $isAnonymous,
        public ?string $customTitle = null,
    ) {}

    public static function fromArray(array $data): self
    {
        return new self(
            status: $data['status'],
            user: User::fromArray($data['user']),
            isAnonymous: $data['is_anonymous'],
            customTitle: $data['custom_title'] ?? null,
        );
    }
}
