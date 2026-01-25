<?php

declare(strict_types=1);

namespace Makhnanov\TelegramBot\Type;

readonly class VideoChatEnded
{
    public function __construct(
        public int $duration,
    ) {}

    public static function fromArray(array $data): self
    {
        return new self(
            duration: $data['duration'],
        );
    }
}
