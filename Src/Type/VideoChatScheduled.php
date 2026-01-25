<?php

declare(strict_types=1);

namespace Makhnanov\TelegramBot\Type;

readonly class VideoChatScheduled
{
    public function __construct(
        public int $startDate,
    ) {}

    public static function fromArray(array $data): self
    {
        return new self(
            startDate: $data['start_date'],
        );
    }
}
