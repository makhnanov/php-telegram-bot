<?php

declare(strict_types=1);

namespace Makhnanov\TelegramBot\Type;

readonly class CallbackQuery
{
    public function __construct(
        public string $id,
        public User $from,
        public string $chatInstance,
        public ?Message $message = null,
        public ?string $inlineMessageId = null,
        public ?string $data = null,
    ) {}

    public static function fromArray(array $data): self
    {
        return new self(
            id: $data['id'],
            from: User::fromArray($data['from']),
            chatInstance: $data['chat_instance'],
            message: isset($data['message']) ? Message::fromArray($data['message']) : null,
            inlineMessageId: $data['inline_message_id'] ?? null,
            data: $data['data'] ?? null,
        );
    }
}