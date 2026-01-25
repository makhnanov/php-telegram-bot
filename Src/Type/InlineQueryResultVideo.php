<?php

declare(strict_types=1);

namespace Makhnanov\TelegramBot\Type;

readonly class InlineQueryResultVideo
{
    public function __construct(
        public string $type,
        public string $id,
        public string $videoUrl,
        public string $mimeType,
        public string $thumbnailUrl,
        public string $title,
        public ?string $caption = null,
        public ?string $parseMode = null,
        public ?array $captionEntities = null,
        public ?bool $showCaptionAboveMedia = null,
        public ?int $videoWidth = null,
        public ?int $videoHeight = null,
        public ?int $videoDuration = null,
        public ?string $description = null,
        public ?InlineKeyboardMarkup $replyMarkup = null,
        public ?InputMessageContent $inputMessageContent = null,
    ) {}

    public static function fromArray(array $data): self
    {
        return new self(
            type: $data['type'],
            id: $data['id'],
            videoUrl: $data['video_url'],
            mimeType: $data['mime_type'],
            thumbnailUrl: $data['thumbnail_url'],
            title: $data['title'],
            caption: $data['caption'] ?? null,
            parseMode: $data['parse_mode'] ?? null,
            captionEntities: isset($data['caption_entities']) ? array_map(MessageEntity::fromArray(...), $data['caption_entities']) : null,
            showCaptionAboveMedia: $data['show_caption_above_media'] ?? null,
            videoWidth: $data['video_width'] ?? null,
            videoHeight: $data['video_height'] ?? null,
            videoDuration: $data['video_duration'] ?? null,
            description: $data['description'] ?? null,
            replyMarkup: isset($data['reply_markup']) ? InlineKeyboardMarkup::fromArray($data['reply_markup']) : null,
            inputMessageContent: isset($data['input_message_content']) ? InputMessageContent::fromArray($data['input_message_content']) : null,
        );
    }
}
