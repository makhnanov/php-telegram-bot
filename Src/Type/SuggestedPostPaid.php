<?php

declare(strict_types=1);

namespace Makhnanov\TelegramBot\Type;

readonly class SuggestedPostPaid
{
    public function __construct(
        public string $currency,
        public ?Message $suggestedPostMessage = null,
        public ?int $amount = null,
        public ?StarAmount $starAmount = null,
    ) {}

    public static function fromArray(array $data): self
    {
        return new self(
            suggestedPostMessage: isset($data['suggested_post_message']) ? Message::fromArray($data['suggested_post_message']) : null,
            currency: $data['currency'],
            amount: $data['amount'] ?? null,
            starAmount: isset($data['star_amount']) ? StarAmount::fromArray($data['star_amount']) : null,
        );
    }
}
