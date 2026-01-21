<?php

declare(strict_types=1);

namespace Makhnanov\TelegramBot\Type;

readonly class Message
{
    public function __construct(
        public int $messageId,
        public Chat $chat,
        public int $date,
        public ?User $from = null,
        public ?string $text = null,
    ) {}

    public static function fromArray(array $data): self
    {
        return new self(
            messageId: $data['message_id'],
            chat: Chat::fromArray($data['chat']),
            date: $data['date'],
            from: isset($data['from']) ? User::fromArray($data['from']) : null,
            text: $data['text'] ?? null,
        );
    }
}