<?php

declare(strict_types=1);

namespace Makhnanov\TelegramBot\Type;

readonly class SuggestedPostApproved
{
    public function __construct(
        public int $sendDate,
        public ?Message $suggestedPostMessage = null,
        public ?SuggestedPostPrice $price = null,
    ) {}

    public static function fromArray(array $data): self
    {
        return new self(
            suggestedPostMessage: isset($data['suggested_post_message']) ? Message::fromArray($data['suggested_post_message']) : null,
            price: isset($data['price']) ? SuggestedPostPrice::fromArray($data['price']) : null,
            sendDate: $data['send_date'],
        );
    }
}
