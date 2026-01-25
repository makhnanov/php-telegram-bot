<?php

declare(strict_types=1);

namespace Makhnanov\TelegramBot\Type;

readonly class InputPollOption
{
    public function __construct(
        public string $text,
        public ?string $textParseMode = null,
        public ?array $textEntities = null,
    ) {}

    public static function fromArray(array $data): self
    {
        return new self(
            text: $data['text'],
            textParseMode: $data['text_parse_mode'] ?? null,
            textEntities: isset($data['text_entities']) ? array_map(MessageEntity::fromArray(...), $data['text_entities']) : null,
        );
    }
}
