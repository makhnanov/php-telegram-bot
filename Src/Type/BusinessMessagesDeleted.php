<?php

declare(strict_types=1);

namespace Makhnanov\TelegramBot\Type;

readonly class BusinessMessagesDeleted
{
    public function __construct(
        public string $businessConnectionId,
        public Chat $chat,
        public array $messageIds,
    ) {}

    public static function fromArray(array $data): self
    {
        return new self(
            businessConnectionId: $data['business_connection_id'],
            chat: Chat::fromArray($data['chat']),
            messageIds: $data['message_ids'],
        );
    }
}
