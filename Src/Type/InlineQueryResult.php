<?php

declare(strict_types=1);

namespace Makhnanov\TelegramBot\Type;

readonly class InlineQueryResult
{
    public function __construct(
        public string $type,
        public string $id,
        public string $title,
        public InputMessageContent $inputMessageContent,
        public ?InlineKeyboardMarkup $replyMarkup = null,
        public ?string $url = null,
        public ?string $description = null,
        public ?string $thumbnailUrl = null,
        public ?int $thumbnailWidth = null,
        public ?int $thumbnailHeight = null,
    ) {}

    public static function fromArray(array $data): self
    {
        return new self(
            type: $data['type'],
            id: $data['id'],
            title: $data['title'],
            inputMessageContent: InputMessageContent::fromArray($data['input_message_content']),
            replyMarkup: isset($data['reply_markup']) ? InlineKeyboardMarkup::fromArray($data['reply_markup']) : null,
            url: $data['url'] ?? null,
            description: $data['description'] ?? null,
            thumbnailUrl: $data['thumbnail_url'] ?? null,
            thumbnailWidth: $data['thumbnail_width'] ?? null,
            thumbnailHeight: $data['thumbnail_height'] ?? null,
        );
    }
}
