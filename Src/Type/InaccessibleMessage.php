<?php

declare(strict_types=1);

namespace Makhnanov\TelegramBot\Type;

readonly class InaccessibleMessage
{
    public function __construct(
        public Chat $chat,
        public int $messageId,
        public int $date,
    ) {}

    public static function fromArray(array $data): self
    {
        return new self(
            chat: Chat::fromArray($data['chat']),
            messageId: $data['message_id'],
            date: $data['date'],
        );
    }
}
