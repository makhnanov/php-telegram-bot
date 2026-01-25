<?php

declare(strict_types=1);

namespace Makhnanov\TelegramBot\Type;

readonly class BackgroundTypeWallpaper
{
    public function __construct(
        public string $type,
        public Document $document,
        public int $darkThemeDimming,
        public ?bool $isBlurred = null,
        public ?bool $isMoving = null,
    ) {}

    public static function fromArray(array $data): self
    {
        return new self(
            type: $data['type'],
            document: Document::fromArray($data['document']),
            darkThemeDimming: $data['dark_theme_dimming'],
            isBlurred: $data['is_blurred'] ?? null,
            isMoving: $data['is_moving'] ?? null,
        );
    }
}
