<?php

declare(strict_types=1);

namespace Makhnanov\TelegramBot\Type;

readonly class ChatMemberMember
{
    public function __construct(
        public string $status,
        public User $user,
        public ?int $untilDate = null,
    ) {}

    public static function fromArray(array $data): self
    {
        return new self(
            status: $data['status'],
            user: User::fromArray($data['user']),
            untilDate: $data['until_date'] ?? null,
        );
    }
}
