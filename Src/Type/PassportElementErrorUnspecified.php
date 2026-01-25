<?php

declare(strict_types=1);

namespace Makhnanov\TelegramBot\Type;

readonly class PassportElementErrorUnspecified
{
    public function __construct(
        public string $source,
        public string $type,
        public string $elementHash,
        public string $message,
    ) {}

    public static function fromArray(array $data): self
    {
        return new self(
            source: $data['source'],
            type: $data['type'],
            elementHash: $data['element_hash'],
            message: $data['message'],
        );
    }
}
