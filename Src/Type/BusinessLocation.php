<?php

declare(strict_types=1);

namespace Makhnanov\TelegramBot\Type;

readonly class BusinessLocation
{
    public function __construct(
        public string $address,
        public ?Location $location = null,
    ) {}

    public static function fromArray(array $data): self
    {
        return new self(
            address: $data['address'],
            location: isset($data['location']) ? Location::fromArray($data['location']) : null,
        );
    }
}
