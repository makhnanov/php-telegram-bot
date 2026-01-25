<?php

declare(strict_types=1);

namespace Makhnanov\TelegramBot\Type;

readonly class LoginUrl
{
    public function __construct(
        public string $url,
        public ?string $forwardText = null,
        public ?string $botUsername = null,
        public ?bool $requestWriteAccess = null,
    ) {}

    public static function fromArray(array $data): self
    {
        return new self(
            url: $data['url'],
            forwardText: $data['forward_text'] ?? null,
            botUsername: $data['bot_username'] ?? null,
            requestWriteAccess: $data['request_write_access'] ?? null,
        );
    }
}
