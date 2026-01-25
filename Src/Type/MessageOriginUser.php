<?php

declare(strict_types=1);

namespace Makhnanov\TelegramBot\Type;

readonly class MessageOriginUser
{
    public function __construct(
        public string $type,
        public int $date,
        public User $senderUser,
    ) {}

    public static function fromArray(array $data): self
    {
        return new self(
            type: $data['type'],
            date: $data['date'],
            senderUser: User::fromArray($data['sender_user']),
        );
    }
}
