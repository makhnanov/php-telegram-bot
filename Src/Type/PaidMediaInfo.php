<?php

declare(strict_types=1);

namespace Makhnanov\TelegramBot\Type;

readonly class PaidMediaInfo
{
    public function __construct(
        public int $starCount,
        public array $paidMedia,
    ) {}

    public static function fromArray(array $data): self
    {
        return new self(
            starCount: $data['star_count'],
            paidMedia: array_map(PaidMedia::fromArray(...), $data['paid_media']),
        );
    }
}
