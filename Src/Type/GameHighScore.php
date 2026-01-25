<?php

declare(strict_types=1);

namespace Makhnanov\TelegramBot\Type;

readonly class GameHighScore
{
    public function __construct(
        public int $position,
        public User $user,
        public int $score,
    ) {}

    public static function fromArray(array $data): self
    {
        return new self(
            position: $data['position'],
            user: User::fromArray($data['user']),
            score: $data['score'],
        );
    }
}
