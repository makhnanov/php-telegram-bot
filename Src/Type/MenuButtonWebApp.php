<?php

declare(strict_types=1);

namespace Makhnanov\TelegramBot\Type;

readonly class MenuButtonWebApp
{
    public function __construct(
        public string $type,
        public string $text,
        public WebAppInfo $webApp,
    ) {}

    public static function fromArray(array $data): self
    {
        return new self(
            type: $data['type'],
            text: $data['text'],
            webApp: WebAppInfo::fromArray($data['web_app']),
        );
    }
}
