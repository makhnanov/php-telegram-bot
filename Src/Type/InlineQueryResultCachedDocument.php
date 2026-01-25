<?php

declare(strict_types=1);

namespace Makhnanov\TelegramBot\Type;

readonly class InlineQueryResultCachedDocument
{
    public function __construct(
        public string $type,
        public string $id,
        public string $title,
        public string $documentFileId,
        public ?string $description = null,
        public ?string $caption = null,
        public ?string $parseMode = null,
        public ?array $captionEntities = null,
        public ?InlineKeyboardMarkup $replyMarkup = null,
        public ?InputMessageContent $inputMessageContent = null,
    ) {}

    public static function fromArray(array $data): self
    {
        return new self(
            type: $data['type'],
            id: $data['id'],
            title: $data['title'],
            documentFileId: $data['document_file_id'],
            description: $data['description'] ?? null,
            caption: $data['caption'] ?? null,
            parseMode: $data['parse_mode'] ?? null,
            captionEntities: isset($data['caption_entities']) ? array_map(MessageEntity::fromArray(...), $data['caption_entities']) : null,
            replyMarkup: isset($data['reply_markup']) ? InlineKeyboardMarkup::fromArray($data['reply_markup']) : null,
            inputMessageContent: isset($data['input_message_content']) ? InputMessageContent::fromArray($data['input_message_content']) : null,
        );
    }
}
