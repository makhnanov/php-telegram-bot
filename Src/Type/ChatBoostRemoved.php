<?php

declare(strict_types=1);

namespace Makhnanov\TelegramBot\Type;

readonly class ChatBoostRemoved
{
    public function __construct(
        public Chat $chat,
        public string $boostId,
        public int $removeDate,
        public ChatBoostSource $source,
    ) {}

    public static function fromArray(array $data): self
    {
        return new self(
            chat: Chat::fromArray($data['chat']),
            boostId: $data['boost_id'],
            removeDate: $data['remove_date'],
            source: ChatBoostSource::fromArray($data['source']),
        );
    }
}
