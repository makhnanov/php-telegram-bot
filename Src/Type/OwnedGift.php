<?php

declare(strict_types=1);

namespace Makhnanov\TelegramBot\Type;

readonly class OwnedGift
{
    public function __construct(
        public string $type,
        public Gift $gift,
        public int $sendDate,
        public ?string $ownedGiftId = null,
        public ?User $senderUser = null,
        public ?string $text = null,
        public ?array $entities = null,
        public ?bool $isPrivate = null,
        public ?bool $isSaved = null,
        public ?bool $canBeUpgraded = null,
        public ?bool $wasRefunded = null,
        public ?int $convertStarCount = null,
        public ?int $prepaidUpgradeStarCount = null,
        public ?bool $isUpgradeSeparate = null,
        public ?int $uniqueGiftNumber = null,
    ) {}

    public static function fromArray(array $data): self
    {
        return new self(
            type: $data['type'],
            gift: Gift::fromArray($data['gift']),
            ownedGiftId: $data['owned_gift_id'] ?? null,
            senderUser: isset($data['sender_user']) ? User::fromArray($data['sender_user']) : null,
            sendDate: $data['send_date'],
            text: $data['text'] ?? null,
            entities: isset($data['entities']) ? array_map(MessageEntity::fromArray(...), $data['entities']) : null,
            isPrivate: $data['is_private'] ?? null,
            isSaved: $data['is_saved'] ?? null,
            canBeUpgraded: $data['can_be_upgraded'] ?? null,
            wasRefunded: $data['was_refunded'] ?? null,
            convertStarCount: $data['convert_star_count'] ?? null,
            prepaidUpgradeStarCount: $data['prepaid_upgrade_star_count'] ?? null,
            isUpgradeSeparate: $data['is_upgrade_separate'] ?? null,
            uniqueGiftNumber: $data['unique_gift_number'] ?? null,
        );
    }
}
