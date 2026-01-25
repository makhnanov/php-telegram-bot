<?php

declare(strict_types=1);

namespace Makhnanov\TelegramBot\Type;

readonly class BusinessOpeningHoursInterval
{
    public function __construct(
        public int $openingMinute,
        public int $closingMinute,
    ) {}

    public static function fromArray(array $data): self
    {
        return new self(
            openingMinute: $data['opening_minute'],
            closingMinute: $data['closing_minute'],
        );
    }
}
