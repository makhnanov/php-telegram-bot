<?php

declare(strict_types=1);

namespace Makhnanov\TelegramBot\Type;

readonly class TransactionPartnerChat
{
    public function __construct(
        public string $type,
        public Chat $chat,
        public ?Gift $gift = null,
    ) {}

    public static function fromArray(array $data): self
    {
        return new self(
            type: $data['type'],
            chat: Chat::fromArray($data['chat']),
            gift: isset($data['gift']) ? Gift::fromArray($data['gift']) : null,
        );
    }
}
