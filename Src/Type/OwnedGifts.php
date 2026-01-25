<?php

declare(strict_types=1);

namespace Makhnanov\TelegramBot\Type;

readonly class OwnedGifts
{
    public function __construct(
        public int $totalCount,
        public array $gifts,
        public ?string $nextOffset = null,
    ) {}

    public static function fromArray(array $data): self
    {
        return new self(
            totalCount: $data['total_count'],
            gifts: array_map(OwnedGift::fromArray(...), $data['gifts']),
            nextOffset: $data['next_offset'] ?? null,
        );
    }
}
