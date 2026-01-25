<?php

declare(strict_types=1);

namespace Makhnanov\TelegramBot\Type;

readonly class UserChatBoosts
{
    public function __construct(
        public array $boosts,
    ) {}

    public static function fromArray(array $data): self
    {
        return new self(
            boosts: array_map(ChatBoost::fromArray(...), $data['boosts']),
        );
    }
}
