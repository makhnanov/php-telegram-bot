<?php

declare(strict_types=1);

namespace Makhnanov\TelegramBot\Type;

readonly class SentWebAppMessage
{
    public function __construct(
        public ?string $inlineMessageId = null,
    ) {}

    public static function fromArray(array $data): self
    {
        return new self(
            inlineMessageId: $data['inline_message_id'] ?? null,
        );
    }
}
