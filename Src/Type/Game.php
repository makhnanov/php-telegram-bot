<?php

declare(strict_types=1);

namespace Makhnanov\TelegramBot\Type;

readonly class Game
{
    public function __construct(
        public string $title,
        public string $description,
        public array $photo,
        public ?string $text = null,
        public ?array $textEntities = null,
        public ?Animation $animation = null,
    ) {}

    public static function fromArray(array $data): self
    {
        return new self(
            title: $data['title'],
            description: $data['description'],
            photo: array_map(PhotoSize::fromArray(...), $data['photo']),
            text: $data['text'] ?? null,
            textEntities: isset($data['text_entities']) ? array_map(MessageEntity::fromArray(...), $data['text_entities']) : null,
            animation: isset($data['animation']) ? Animation::fromArray($data['animation']) : null,
        );
    }
}
