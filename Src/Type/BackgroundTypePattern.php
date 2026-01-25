<?php

declare(strict_types=1);

namespace Makhnanov\TelegramBot\Type;

readonly class BackgroundTypePattern
{
    public function __construct(
        public string $type,
        public Document $document,
        public BackgroundFill $fill,
        public int $intensity,
        public ?bool $isInverted = null,
        public ?bool $isMoving = null,
    ) {}

    public static function fromArray(array $data): self
    {
        return new self(
            type: $data['type'],
            document: Document::fromArray($data['document']),
            fill: BackgroundFill::fromArray($data['fill']),
            intensity: $data['intensity'],
            isInverted: $data['is_inverted'] ?? null,
            isMoving: $data['is_moving'] ?? null,
        );
    }
}
