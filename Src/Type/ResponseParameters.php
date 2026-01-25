<?php

declare(strict_types=1);

namespace Makhnanov\TelegramBot\Type;

readonly class ResponseParameters
{
    public function __construct(
        public ?int $migrateToChatId = null,
        public ?int $retryAfter = null,
    ) {}

    public static function fromArray(array $data): self
    {
        return new self(
            migrateToChatId: $data['migrate_to_chat_id'] ?? null,
            retryAfter: $data['retry_after'] ?? null,
        );
    }
}
