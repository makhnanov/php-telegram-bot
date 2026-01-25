<?php

declare(strict_types=1);

namespace Makhnanov\TelegramBot\Type;

readonly class TransactionPartnerTelegramApi
{
    public function __construct(
        public string $type,
        public int $requestCount,
    ) {}

    public static function fromArray(array $data): self
    {
        return new self(
            type: $data['type'],
            requestCount: $data['request_count'],
        );
    }
}
