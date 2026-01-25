<?php

declare(strict_types=1);

namespace Makhnanov\TelegramBot\Type;

readonly class MessageId
{
    public function __construct(
        public int $messageId,
    ) {}

    public static function fromArray(array $data): self
    {
        return new self(
            messageId: $data['message_id'],
        );
    }
}
