<?php

declare(strict_types=1);

namespace Makhnanov\TelegramBot\Type;

readonly class ReplyParameters
{
    public function __construct(
        public int $messageId,
        public int|string|null $chatId = null,
        public ?bool $allowSendingWithoutReply = null,
        public ?string $quote = null,
        public ?string $quoteParseMode = null,
        public ?array $quoteEntities = null,
        public ?int $quotePosition = null,
        public ?int $checklistTaskId = null,
    ) {}

    public static function fromArray(array $data): self
    {
        return new self(
            messageId: $data['message_id'],
            chatId: $data['chat_id'] ?? null,
            allowSendingWithoutReply: $data['allow_sending_without_reply'] ?? null,
            quote: $data['quote'] ?? null,
            quoteParseMode: $data['quote_parse_mode'] ?? null,
            quoteEntities: isset($data['quote_entities']) ? array_map(MessageEntity::fromArray(...), $data['quote_entities']) : null,
            quotePosition: $data['quote_position'] ?? null,
            checklistTaskId: $data['checklist_task_id'] ?? null,
        );
    }
}
