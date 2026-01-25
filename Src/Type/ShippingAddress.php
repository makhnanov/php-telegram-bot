<?php

declare(strict_types=1);

namespace Makhnanov\TelegramBot\Type;

readonly class ShippingAddress
{
    public function __construct(
        public string $countryCode,
        public string $state,
        public string $city,
        public string $streetLine1,
        public string $streetLine2,
        public string $postCode,
    ) {}

    public static function fromArray(array $data): self
    {
        return new self(
            countryCode: $data['country_code'],
            state: $data['state'],
            city: $data['city'],
            streetLine1: $data['street_line1'],
            streetLine2: $data['street_line2'],
            postCode: $data['post_code'],
        );
    }
}
