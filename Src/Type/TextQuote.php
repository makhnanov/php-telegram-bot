<?php

declare(strict_types=1);

namespace Makhnanov\TelegramBot\Type;

readonly class TextQuote
{
    public function __construct(
        public string $text,
        public int $position,
        public ?array $entities = null,
        public ?bool $isManual = null,
    ) {}

    public static function fromArray(array $data): self
    {
        return new self(
            text: $data['text'],
            entities: isset($data['entities']) ? array_map(MessageEntity::fromArray(...), $data['entities']) : null,
            position: $data['position'],
            isManual: $data['is_manual'] ?? null,
        );
    }
}
