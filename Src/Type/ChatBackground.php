<?php

declare(strict_types=1);

namespace Makhnanov\TelegramBot\Type;

readonly class ChatBackground
{
    public function __construct(
        public BackgroundType $type,
    ) {}

    public static function fromArray(array $data): self
    {
        return new self(
            type: BackgroundType::fromArray($data['type']),
        );
    }
}
