<?php

declare(strict_types=1);

namespace Makhnanov\TelegramBot\Type;

readonly class PaidMediaPhoto
{
    public function __construct(
        public string $type,
        public array $photo,
    ) {}

    public static function fromArray(array $data): self
    {
        return new self(
            type: $data['type'],
            photo: array_map(PhotoSize::fromArray(...), $data['photo']),
        );
    }
}
