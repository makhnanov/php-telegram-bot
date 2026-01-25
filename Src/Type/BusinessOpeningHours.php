<?php

declare(strict_types=1);

namespace Makhnanov\TelegramBot\Type;

readonly class BusinessOpeningHours
{
    public function __construct(
        public string $timeZoneName,
        public array $openingHours,
    ) {}

    public static function fromArray(array $data): self
    {
        return new self(
            timeZoneName: $data['time_zone_name'],
            openingHours: array_map(BusinessOpeningHoursInterval::fromArray(...), $data['opening_hours']),
        );
    }
}
