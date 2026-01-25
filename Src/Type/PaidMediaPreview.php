<?php

declare(strict_types=1);

namespace Makhnanov\TelegramBot\Type;

readonly class PaidMediaPreview
{
    public function __construct(
        public string $type,
        public ?int $width = null,
        public ?int $height = null,
        public ?int $duration = null,
    ) {}

    public static function fromArray(array $data): self
    {
        return new self(
            type: $data['type'],
            width: $data['width'] ?? null,
            height: $data['height'] ?? null,
            duration: $data['duration'] ?? null,
        );
    }
}
