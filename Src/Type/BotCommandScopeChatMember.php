<?php

declare(strict_types=1);

namespace Makhnanov\TelegramBot\Type;

readonly class BotCommandScopeChatMember
{
    public function __construct(
        public string $type,
        public int|string $chatId,
        public int $userId,
    ) {}

    public static function fromArray(array $data): self
    {
        return new self(
            type: $data['type'],
            chatId: $data['chat_id'],
            userId: $data['user_id'],
        );
    }
}
