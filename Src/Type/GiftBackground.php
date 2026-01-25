<?php

declare(strict_types=1);

namespace Makhnanov\TelegramBot\Type;

readonly class GiftBackground
{
    public function __construct(
        public int $centerColor,
        public int $edgeColor,
        public int $textColor,
    ) {}

    public static function fromArray(array $data): self
    {
        return new self(
            centerColor: $data['center_color'],
            edgeColor: $data['edge_color'],
            textColor: $data['text_color'],
        );
    }
}
