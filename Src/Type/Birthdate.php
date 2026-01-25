<?php

declare(strict_types=1);

namespace Makhnanov\TelegramBot\Type;

readonly class Birthdate
{
    public function __construct(
        public int $day,
        public int $month,
        public ?int $year = null,
    ) {}

    public static function fromArray(array $data): self
    {
        return new self(
            day: $data['day'],
            month: $data['month'],
            year: $data['year'] ?? null,
        );
    }
}
