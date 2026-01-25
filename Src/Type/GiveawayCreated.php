<?php

declare(strict_types=1);

namespace Makhnanov\TelegramBot\Type;

readonly class GiveawayCreated
{
    public function __construct(
        public ?int $prizeStarCount = null,
    ) {}

    public static function fromArray(array $data): self
    {
        return new self(
            prizeStarCount: $data['prize_star_count'] ?? null,
        );
    }
}
