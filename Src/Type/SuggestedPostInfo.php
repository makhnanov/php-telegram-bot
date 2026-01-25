<?php

declare(strict_types=1);

namespace Makhnanov\TelegramBot\Type;

readonly class SuggestedPostInfo
{
    public function __construct(
        public string $state,
        public ?SuggestedPostPrice $price = null,
        public ?int $sendDate = null,
    ) {}

    public static function fromArray(array $data): self
    {
        return new self(
            state: $data['state'],
            price: isset($data['price']) ? SuggestedPostPrice::fromArray($data['price']) : null,
            sendDate: $data['send_date'] ?? null,
        );
    }
}
