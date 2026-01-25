<?php

declare(strict_types=1);

namespace Makhnanov\TelegramBot\Type;

readonly class SuggestedPostPrice
{
    public function __construct(
        public string $currency,
        public int $amount,
    ) {}

    public static function fromArray(array $data): self
    {
        return new self(
            currency: $data['currency'],
            amount: $data['amount'],
        );
    }
}
