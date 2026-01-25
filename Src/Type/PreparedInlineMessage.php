<?php

declare(strict_types=1);

namespace Makhnanov\TelegramBot\Type;

readonly class PreparedInlineMessage
{
    public function __construct(
        public string $id,
        public int $expirationDate,
    ) {}

    public static function fromArray(array $data): self
    {
        return new self(
            id: $data['id'],
            expirationDate: $data['expiration_date'],
        );
    }
}
