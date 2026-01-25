<?php

declare(strict_types=1);

namespace Makhnanov\TelegramBot\Type;

readonly class ChatBoostAdded
{
    public function __construct(
        public int $boostCount,
    ) {}

    public static function fromArray(array $data): self
    {
        return new self(
            boostCount: $data['boost_count'],
        );
    }
}
