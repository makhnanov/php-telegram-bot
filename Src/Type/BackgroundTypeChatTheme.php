<?php

declare(strict_types=1);

namespace Makhnanov\TelegramBot\Type;

readonly class BackgroundTypeChatTheme
{
    public function __construct(
        public string $type,
        public string $themeName,
    ) {}

    public static function fromArray(array $data): self
    {
        return new self(
            type: $data['type'],
            themeName: $data['theme_name'],
        );
    }
}
