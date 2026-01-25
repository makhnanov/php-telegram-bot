<?php

declare(strict_types=1);

namespace Makhnanov\TelegramBot\Type;

readonly class StarTransactions
{
    public function __construct(
        public array $transactions,
    ) {}

    public static function fromArray(array $data): self
    {
        return new self(
            transactions: array_map(StarTransaction::fromArray(...), $data['transactions']),
        );
    }
}
