<?php

declare(strict_types=1);

namespace Makhnanov\TelegramBot\Type;

readonly class InputPaidMediaPhoto
{
    public function __construct(
        public string $type,
        public string $media,
    ) {}

    public static function fromArray(array $data): self
    {
        return new self(
            type: $data['type'],
            media: $data['media'],
        );
    }
}
