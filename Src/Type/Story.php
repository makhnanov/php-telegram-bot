<?php

declare(strict_types=1);

namespace Makhnanov\TelegramBot\Type;

readonly class Story
{
    public function __construct(
        public Chat $chat,
        public int $id,
    ) {}

    public static function fromArray(array $data): self
    {
        return new self(
            chat: Chat::fromArray($data['chat']),
            id: $data['id'],
        );
    }
}
