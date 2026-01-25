<?php

declare(strict_types=1);

namespace Makhnanov\TelegramBot\Type;

readonly class UniqueGiftInfo
{
    public function __construct(
        public UniqueGift $gift,
        public string $origin,
        public ?string $lastResaleCurrency = null,
        public ?int $lastResaleAmount = null,
        public ?string $ownedGiftId = null,
        public ?int $transferStarCount = null,
        public ?int $nextTransferDate = null,
    ) {}

    public static function fromArray(array $data): self
    {
        return new self(
            gift: UniqueGift::fromArray($data['gift']),
            origin: $data['origin'],
            lastResaleCurrency: $data['last_resale_currency'] ?? null,
            lastResaleAmount: $data['last_resale_amount'] ?? null,
            ownedGiftId: $data['owned_gift_id'] ?? null,
            transferStarCount: $data['transfer_star_count'] ?? null,
            nextTransferDate: $data['next_transfer_date'] ?? null,
        );
    }
}
