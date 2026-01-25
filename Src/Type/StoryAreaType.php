<?php

declare(strict_types=1);

namespace Makhnanov\TelegramBot\Type;

readonly class StoryAreaType
{
    public function __construct(
        public string $type,
        public float $latitude,
        public float $longitude,
        public ?LocationAddress $address = null,
    ) {}

    public static function fromArray(array $data): self
    {
        return new self(
            type: $data['type'],
            latitude: $data['latitude'],
            longitude: $data['longitude'],
            address: isset($data['address']) ? LocationAddress::fromArray($data['address']) : null,
        );
    }
}
