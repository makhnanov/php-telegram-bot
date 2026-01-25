<?php

declare(strict_types=1);

namespace Makhnanov\TelegramBot\Type;

readonly class SuggestedPostParameters
{
    public function __construct(
        public ?SuggestedPostPrice $price = null,
        public ?int $sendDate = null,
    ) {}

    public static function fromArray(array $data): self
    {
        return new self(
            price: isset($data['price']) ? SuggestedPostPrice::fromArray($data['price']) : null,
            sendDate: $data['send_date'] ?? null,
        );
    }
}
