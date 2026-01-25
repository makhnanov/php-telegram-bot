<?php

declare(strict_types=1);

namespace Makhnanov\TelegramBot\Type;

readonly class UniqueGiftModel
{
    public function __construct(
        public string $name,
        public Sticker $sticker,
        public int $rarityPerMille,
    ) {}

    public static function fromArray(array $data): self
    {
        return new self(
            name: $data['name'],
            sticker: Sticker::fromArray($data['sticker']),
            rarityPerMille: $data['rarity_per_mille'],
        );
    }
}
