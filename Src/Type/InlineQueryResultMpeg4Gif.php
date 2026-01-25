<?php

declare(strict_types=1);

namespace Makhnanov\TelegramBot\Type;

readonly class InlineQueryResultMpeg4Gif
{
    public function __construct(
        public string $type,
        public string $id,
        public string $mpeg4Url,
        public string $thumbnailUrl,
        public ?int $mpeg4Width = null,
        public ?int $mpeg4Height = null,
        public ?int $mpeg4Duration = null,
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
            mpeg4Url: $data['mpeg4_url'],
            mpeg4Width: $data['mpeg4_width'] ?? null,
            mpeg4Height: $data['mpeg4_height'] ?? null,
            mpeg4Duration: $data['mpeg4_duration'] ?? null,
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
