<?php

declare(strict_types=1);

namespace Makhnanov\TelegramBot\Type;

readonly class InlineQueryResultGif
{
    public function __construct(
        public string $type,
        public string $id,
        public string $gifUrl,
        public string $thumbnailUrl,
        public ?int $gifWidth = null,
        public ?int $gifHeight = null,
        public ?int $gifDuration = null,
        public ?string $thumbnailMimeType = null,
        public ?string $title = null,
        public ?string $caption = null,
        public ?string $parseMode = null,
        public ?array $captionEntities = null,
        public ?bool $showCaptionAboveMedia = null,
        public ?InlineKeyboardMarkup $replyMarkup = null,
        public ?InputMessageContent $inputMessageContent = null,
    ) {}

    public static function fromArray(array $data): self
    {
        return new self(
            type: $data['type'],
            id: $data['id'],
            gifUrl: $data['gif_url'],
            gifWidth: $data['gif_width'] ?? null,
            gifHeight: $data['gif_height'] ?? null,
            gifDuration: $data['gif_duration'] ?? null,
            thumbnailUrl: $data['thumbnail_url'],
            thumbnailMimeType: $data['thumbnail_mime_type'] ?? null,
            title: $data['title'] ?? null,
            caption: $data['caption'] ?? null,
            parseMode: $data['parse_mode'] ?? null,
            captionEntities: isset($data['caption_entities']) ? array_map(MessageEntity::fromArray(...), $data['caption_entities']) : null,
            showCaptionAboveMedia: $data['show_caption_above_media'] ?? null,
            replyMarkup: isset($data['reply_markup']) ? InlineKeyboardMarkup::fromArray($data['reply_markup']) : null,
            inputMessageContent: isset($data['input_message_content']) ? InputMessageContent::fromArray($data['input_message_content']) : null,
        );
    }
}
