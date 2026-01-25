<?php

declare(strict_types=1);

namespace Makhnanov\TelegramBot\Type;

readonly class CallbackGame
{
    public function __construct(
        public int $userId,
        public int $score,
        public ?bool $force = null,
        public ?bool $disableEditMessage = null,
        public ?int $chatId = null,
        public ?int $messageId = null,
        public ?string $inlineMessageId = null,
    ) {}

    public static function fromArray(array $data): self
    {
        return new self(
            userId: $data['user_id'],
            score: $data['score'],
            force: $data['force'] ?? null,
            disableEditMessage: $data['disable_edit_message'] ?? null,
            chatId: $data['chat_id'] ?? null,
            messageId: $data['message_id'] ?? null,
            inlineMessageId: $data['inline_message_id'] ?? null,
        );
    }
}
