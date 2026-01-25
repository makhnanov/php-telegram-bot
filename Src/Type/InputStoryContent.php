<?php

declare(strict_types=1);

namespace Makhnanov\TelegramBot\Type;

readonly class InputStoryContent
{
    public function __construct(
        public string $type,
        public string $photo,
    ) {}

    public static function fromArray(array $data): self
    {
        return new self(
            type: $data['type'],
            photo: $data['photo'],
        );
    }
}
