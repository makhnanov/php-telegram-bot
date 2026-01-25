<?php

declare(strict_types=1);

namespace Makhnanov\TelegramBot\Type;

readonly class PaidMessagePriceChanged
{
    public function __construct(
        public int $paidMessageStarCount,
    ) {}

    public static function fromArray(array $data): self
    {
        return new self(
            paidMessageStarCount: $data['paid_message_star_count'],
        );
    }
}
