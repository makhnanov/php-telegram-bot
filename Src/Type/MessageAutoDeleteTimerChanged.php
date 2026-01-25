<?php

declare(strict_types=1);

namespace Makhnanov\TelegramBot\Type;

readonly class MessageAutoDeleteTimerChanged
{
    public function __construct(
        public int $messageAutoDeleteTime,
    ) {}

    public static function fromArray(array $data): self
    {
        return new self(
            messageAutoDeleteTime: $data['message_auto_delete_time'],
        );
    }
}
