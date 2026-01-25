<?php

declare(strict_types=1);

namespace Makhnanov\TelegramBot\Type;

readonly class UserRating
{
    public function __construct(
        public int $level,
        public int $rating,
        public int $currentLevelRating,
        public ?int $nextLevelRating = null,
    ) {}

    public static function fromArray(array $data): self
    {
        return new self(
            level: $data['level'],
            rating: $data['rating'],
            currentLevelRating: $data['current_level_rating'],
            nextLevelRating: $data['next_level_rating'] ?? null,
        );
    }
}
