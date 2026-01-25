<?php

declare(strict_types=1);

namespace Makhnanov\TelegramBot\Type;

readonly class SuggestedPostApprovalFailed
{
    public function __construct(
        public SuggestedPostPrice $price,
        public ?Message $suggestedPostMessage = null,
    ) {}

    public static function fromArray(array $data): self
    {
        return new self(
            suggestedPostMessage: isset($data['suggested_post_message']) ? Message::fromArray($data['suggested_post_message']) : null,
            price: SuggestedPostPrice::fromArray($data['price']),
        );
    }
}
