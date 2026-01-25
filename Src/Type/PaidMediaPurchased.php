<?php

declare(strict_types=1);

namespace Makhnanov\TelegramBot\Type;

readonly class PaidMediaPurchased
{
    public function __construct(
        public User $from,
        public string $paidMediaPayload,
    ) {}

    public static function fromArray(array $data): self
    {
        return new self(
            from: User::fromArray($data['from']),
            paidMediaPayload: $data['paid_media_payload'],
        );
    }
}
