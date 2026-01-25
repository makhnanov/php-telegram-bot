<?php

declare(strict_types=1);

namespace Makhnanov\TelegramBot\Type;

readonly class ChatBoost
{
    public function __construct(
        public string $boostId,
        public int $addDate,
        public int $expirationDate,
        public ChatBoostSource $source,
    ) {}

    public static function fromArray(array $data): self
    {
        return new self(
            boostId: $data['boost_id'],
            addDate: $data['add_date'],
            expirationDate: $data['expiration_date'],
            source: ChatBoostSource::fromArray($data['source']),
        );
    }
}
