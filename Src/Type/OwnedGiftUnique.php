<?php

declare(strict_types=1);

namespace Makhnanov\TelegramBot\Type;

readonly class OwnedGiftUnique
{
    public function __construct(
        public string $type,
        public UniqueGift $gift,
        public int $sendDate,
        public ?string $ownedGiftId = null,
        public ?User $senderUser = null,
        public ?bool $isSaved = null,
        public ?bool $canBeTransferred = null,
        public ?int $transferStarCount = null,
        public ?int $nextTransferDate = null,
    ) {}

    public static function fromArray(array $data): self
    {
        return new self(
            type: $data['type'],
            gift: UniqueGift::fromArray($data['gift']),
            ownedGiftId: $data['owned_gift_id'] ?? null,
            senderUser: isset($data['sender_user']) ? User::fromArray($data['sender_user']) : null,
            sendDate: $data['send_date'],
            isSaved: $data['is_saved'] ?? null,
            canBeTransferred: $data['can_be_transferred'] ?? null,
            transferStarCount: $data['transfer_star_count'] ?? null,
            nextTransferDate: $data['next_transfer_date'] ?? null,
        );
    }
}
