<?php

declare(strict_types=1);

namespace Makhnanov\TelegramBot\Type;

readonly class StarTransaction
{
    public function __construct(
        public string $id,
        public int $amount,
        public int $date,
        public ?int $nanostarAmount = null,
        public ?TransactionPartner $source = null,
        public ?TransactionPartner $receiver = null,
    ) {}

    public static function fromArray(array $data): self
    {
        return new self(
            id: $data['id'],
            amount: $data['amount'],
            nanostarAmount: $data['nanostar_amount'] ?? null,
            date: $data['date'],
            source: isset($data['source']) ? TransactionPartner::fromArray($data['source']) : null,
            receiver: isset($data['receiver']) ? TransactionPartner::fromArray($data['receiver']) : null,
        );
    }
}
