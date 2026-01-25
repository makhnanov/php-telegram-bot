<?php

declare(strict_types=1);

namespace Makhnanov\TelegramBot\Type;

readonly class LocationAddress
{
    public function __construct(
        public string $countryCode,
        public ?string $state = null,
        public ?string $city = null,
        public ?string $street = null,
    ) {}

    public static function fromArray(array $data): self
    {
        return new self(
            countryCode: $data['country_code'],
            state: $data['state'] ?? null,
            city: $data['city'] ?? null,
            street: $data['street'] ?? null,
        );
    }
}
