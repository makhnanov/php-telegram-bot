<?php

declare(strict_types=1);

namespace Makhnanov\TelegramBot\Type;

readonly class ChatBoostSourcePremium
{
    public function __construct(
        public string $source,
        public User $user,
    ) {}

    public static function fromArray(array $data): self
    {
        return new self(
            source: $data['source'],
            user: User::fromArray($data['user']),
        );
    }
}
