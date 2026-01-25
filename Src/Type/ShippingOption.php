<?php

declare(strict_types=1);

namespace Makhnanov\TelegramBot\Type;

readonly class ShippingOption
{
    public function __construct(
        public string $id,
        public string $title,
        public array $prices,
    ) {}

    public static function fromArray(array $data): self
    {
        return new self(
            id: $data['id'],
            title: $data['title'],
            prices: array_map(LabeledPrice::fromArray(...), $data['prices']),
        );
    }
}
