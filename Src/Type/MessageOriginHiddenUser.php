<?php

declare(strict_types=1);

namespace Makhnanov\TelegramBot\Type;

readonly class MessageOriginHiddenUser
{
    public function __construct(
        public string $type,
        public int $date,
        public string $senderUserName,
    ) {}

    public static function fromArray(array $data): self
    {
        return new self(
            type: $data['type'],
            date: $data['date'],
            senderUserName: $data['sender_user_name'],
        );
    }
}
