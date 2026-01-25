<?php

declare(strict_types=1);

namespace Makhnanov\TelegramBot\Type;

readonly class CopyTextButton
{
    public function __construct(
        public string $text,
    ) {}

    public static function fromArray(array $data): self
    {
        return new self(
            text: $data['text'],
        );
    }
}
