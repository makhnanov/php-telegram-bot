<?php

declare(strict_types=1);

namespace Makhnanov\TelegramBot\Type;

readonly class LabeledPrice
{
    public function __construct(
        public string $label,
        public int $amount,
    ) {}

    public static function fromArray(array $data): self
    {
        return new self(
            label: $data['label'],
            amount: $data['amount'],
        );
    }
}
