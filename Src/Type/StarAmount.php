<?php

declare(strict_types=1);

namespace Makhnanov\TelegramBot\Type;

readonly class StarAmount
{
    public function __construct(
        public int $amount,
        public ?int $nanostarAmount = null,
    ) {}

    public static function fromArray(array $data): self
    {
        return new self(
            amount: $data['amount'],
            nanostarAmount: $data['nanostar_amount'] ?? null,
        );
    }
}
