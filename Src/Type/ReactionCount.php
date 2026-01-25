<?php

declare(strict_types=1);

namespace Makhnanov\TelegramBot\Type;

readonly class ReactionCount
{
    public function __construct(
        public ReactionType $type,
        public int $totalCount,
    ) {}

    public static function fromArray(array $data): self
    {
        return new self(
            type: ReactionType::fromArray($data['type']),
            totalCount: $data['total_count'],
        );
    }
}
