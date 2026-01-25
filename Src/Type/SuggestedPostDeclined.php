<?php

declare(strict_types=1);

namespace Makhnanov\TelegramBot\Type;

readonly class SuggestedPostDeclined
{
    public function __construct(
        public ?Message $suggestedPostMessage = null,
        public ?string $comment = null,
    ) {}

    public static function fromArray(array $data): self
    {
        return new self(
            suggestedPostMessage: isset($data['suggested_post_message']) ? Message::fromArray($data['suggested_post_message']) : null,
            comment: $data['comment'] ?? null,
        );
    }
}
