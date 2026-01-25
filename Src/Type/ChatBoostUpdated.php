<?php

declare(strict_types=1);

namespace Makhnanov\TelegramBot\Type;

readonly class ChatBoostUpdated
{
    public function __construct(
        public Chat $chat,
        public ChatBoost $boost,
    ) {}

    public static function fromArray(array $data): self
    {
        return new self(
            chat: Chat::fromArray($data['chat']),
            boost: ChatBoost::fromArray($data['boost']),
        );
    }
}
