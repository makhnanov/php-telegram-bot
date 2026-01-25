<?php

declare(strict_types=1);

namespace Makhnanov\TelegramBot\Type;

readonly class BotCommand
{
    public function __construct(
        public string $command,
        public string $description,
    ) {}

    public static function fromArray(array $data): self
    {
        return new self(
            command: $data['command'],
            description: $data['description'],
        );
    }
}
