<?php

declare(strict_types=1);

namespace Makhnanov\TelegramBot\Type;

readonly class MenuButtonDefault
{
    public function __construct(
        public string $type,
    ) {}

    public static function fromArray(array $data): self
    {
        return new self(
            type: $data['type'],
        );
    }
}
