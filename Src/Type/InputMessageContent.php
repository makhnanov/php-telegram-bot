<?php

declare(strict_types=1);

namespace Makhnanov\TelegramBot\Type;

readonly class InputMessageContent
{
    public function __construct(
        public string $messageText,
        public ?string $parseMode = null,
        public ?array $entities = null,
        public ?LinkPreviewOptions $linkPreviewOptions = null,
    ) {}

    public static function fromArray(array $data): self
    {
        return new self(
            messageText: $data['message_text'],
            parseMode: $data['parse_mode'] ?? null,
            entities: isset($data['entities']) ? array_map(MessageEntity::fromArray(...), $data['entities']) : null,
            linkPreviewOptions: isset($data['link_preview_options']) ? LinkPreviewOptions::fromArray($data['link_preview_options']) : null,
        );
    }
}
