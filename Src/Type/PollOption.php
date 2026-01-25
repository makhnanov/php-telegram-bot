<?php

declare(strict_types=1);

namespace Makhnanov\TelegramBot\Type;

readonly class PollOption
{
    public function __construct(
        public string $text,
        public int $voterCount,
        public ?array $textEntities = null,
    ) {}

    public static function fromArray(array $data): self
    {
        return new self(
            text: $data['text'],
            textEntities: isset($data['text_entities']) ? array_map(MessageEntity::fromArray(...), $data['text_entities']) : null,
            voterCount: $data['voter_count'],
        );
    }
}
