<?php

declare(strict_types=1);

namespace Makhnanov\TelegramBot\Type;

readonly class RevenueWithdrawalStateSucceeded
{
    public function __construct(
        public string $type,
        public int $date,
        public string $url,
    ) {}

    public static function fromArray(array $data): self
    {
        return new self(
            type: $data['type'],
            date: $data['date'],
            url: $data['url'],
        );
    }
}
