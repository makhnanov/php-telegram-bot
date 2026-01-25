<?php

declare(strict_types=1);

namespace Makhnanov\TelegramBot\Type;

readonly class Gifts
{
    public function __construct(
        public array $gifts,
    ) {}

    public static function fromArray(array $data): self
    {
        return new self(
            gifts: array_map(Gift::fromArray(...), $data['gifts']),
        );
    }
}
