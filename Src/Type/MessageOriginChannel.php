<?php

declare(strict_types=1);

namespace Makhnanov\TelegramBot\Type;

readonly class MessageOriginChannel
{
    public function __construct(
        public string $type,
        public int $date,
        public Chat $chat,
        public int $messageId,
        public ?string $authorSignature = null,
    ) {}

    public static function fromArray(array $data): self
    {
        return new self(
            type: $data['type'],
            date: $data['date'],
            chat: Chat::fromArray($data['chat']),
            messageId: $data['message_id'],
            authorSignature: $data['author_signature'] ?? null,
        );
    }
}
