<?php

declare(strict_types=1);

namespace Makhnanov\TelegramBot\Type;

readonly class InputLocationMessageContent
{
    public function __construct(
        public float $latitude,
        public float $longitude,
        public ?float $horizontalAccuracy = null,
        public ?int $livePeriod = null,
        public ?int $heading = null,
        public ?int $proximityAlertRadius = null,
    ) {}

    public static function fromArray(array $data): self
    {
        return new self(
            latitude: $data['latitude'],
            longitude: $data['longitude'],
            horizontalAccuracy: $data['horizontal_accuracy'] ?? null,
            livePeriod: $data['live_period'] ?? null,
            heading: $data['heading'] ?? null,
            proximityAlertRadius: $data['proximity_alert_radius'] ?? null,
        );
    }
}
