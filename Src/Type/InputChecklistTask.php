<?php

declare(strict_types=1);

namespace Makhnanov\TelegramBot\Type;

readonly class InputChecklistTask
{
    public function __construct(
        public int $id,
        public string $text,
        public ?string $parseMode = null,
        public ?array $textEntities = null,
    ) {}

    public static function fromArray(array $data): self
    {
        return new self(
            id: $data['id'],
            text: $data['text'],
            parseMode: $data['parse_mode'] ?? null,
            textEntities: isset($data['text_entities']) ? array_map(MessageEntity::fromArray(...), $data['text_entities']) : null,
        );
    }
}
