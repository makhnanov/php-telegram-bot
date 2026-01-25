<?php

declare(strict_types=1);

namespace Makhnanov\TelegramBot\Type;

readonly class BotCommandScopeChat
{
    public function __construct(
        public string $type,
        public int|string $chatId,
    ) {}

    public static function fromArray(array $data): self
    {
        return new self(
            type: $data['type'],
            chatId: $data['chat_id'],
        );
    }
}
