<?php

declare(strict_types=1);

namespace Makhnanov\TelegramBot\Type;

readonly class Invoice
{
    public function __construct(
        public string $title,
        public string $description,
        public string $startParameter,
        public string $currency,
        public int $totalAmount,
    ) {}

    public static function fromArray(array $data): self
    {
        return new self(
            title: $data['title'],
            description: $data['description'],
            startParameter: $data['start_parameter'],
            currency: $data['currency'],
            totalAmount: $data['total_amount'],
        );
    }
}
