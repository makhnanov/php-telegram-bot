<?php

declare(strict_types=1);

namespace Makhnanov\TelegramBot\Type;

readonly class MessageOriginChat
{
    public function __construct(
        public string $type,
        public int $date,
        public Chat $senderChat,
        public ?string $authorSignature = null,
    ) {}

    public static function fromArray(array $data): self
    {
        return new self(
            type: $data['type'],
            date: $data['date'],
            senderChat: Chat::fromArray($data['sender_chat']),
            authorSignature: $data['author_signature'] ?? null,
        );
    }
}
