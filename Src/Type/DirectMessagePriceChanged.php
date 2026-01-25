<?php

declare(strict_types=1);

namespace Makhnanov\TelegramBot\Type;

readonly class DirectMessagePriceChanged
{
    public function __construct(
        public bool $areDirectMessagesEnabled,
        public ?int $directMessageStarCount = null,
    ) {}

    public static function fromArray(array $data): self
    {
        return new self(
            areDirectMessagesEnabled: $data['are_direct_messages_enabled'],
            directMessageStarCount: $data['direct_message_star_count'] ?? null,
        );
    }
}
