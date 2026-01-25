<?php

declare(strict_types=1);

namespace Makhnanov\TelegramBot\Type;

readonly class StoryAreaTypeLink
{
    public function __construct(
        public string $type,
        public string $url,
    ) {}

    public static function fromArray(array $data): self
    {
        return new self(
            type: $data['type'],
            url: $data['url'],
        );
    }
}
