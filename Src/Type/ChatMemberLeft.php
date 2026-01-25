<?php

declare(strict_types=1);

namespace Makhnanov\TelegramBot\Type;

readonly class ChatMemberLeft
{
    public function __construct(
        public string $status,
        public User $user,
    ) {}

    public static function fromArray(array $data): self
    {
        return new self(
            status: $data['status'],
            user: User::fromArray($data['user']),
        );
    }
}
