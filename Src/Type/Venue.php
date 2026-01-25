<?php

declare(strict_types=1);

namespace Makhnanov\TelegramBot\Type;

readonly class Venue
{
    public function __construct(
        public Location $location,
        public string $title,
        public string $address,
        public ?string $foursquareId = null,
        public ?string $foursquareType = null,
        public ?string $googlePlaceId = null,
        public ?string $googlePlaceType = null,
    ) {}

    public static function fromArray(array $data): self
    {
        return new self(
            location: Location::fromArray($data['location']),
            title: $data['title'],
            address: $data['address'],
            foursquareId: $data['foursquare_id'] ?? null,
            foursquareType: $data['foursquare_type'] ?? null,
            googlePlaceId: $data['google_place_id'] ?? null,
            googlePlaceType: $data['google_place_type'] ?? null,
        );
    }
}
