<?php

declare(strict_types=1);

namespace Makhnanov\TelegramBot\Type;

readonly class UniqueGiftBackdrop
{
    public function __construct(
        public string $name,
        public UniqueGiftBackdropColors $colors,
        public int $rarityPerMille,
    ) {}

    public static function fromArray(array $data): self
    {
        return new self(
            name: $data['name'],
            colors: UniqueGiftBackdropColors::fromArray($data['colors']),
            rarityPerMille: $data['rarity_per_mille'],
        );
    }
}
