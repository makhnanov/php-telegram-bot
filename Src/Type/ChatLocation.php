<?php

declare(strict_types=1);

namespace Makhnanov\TelegramBot\Type;

readonly class ChatLocation
{
    public function __construct(
        public Location $location,
        public string $address,
    ) {}

    public static function fromArray(array $data): self
    {
        return new self(
            location: Location::fromArray($data['location']),
            address: $data['address'],
        );
    }
}
