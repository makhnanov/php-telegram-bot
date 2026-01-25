<?php

declare(strict_types=1);

namespace Makhnanov\TelegramBot\Type;

readonly class GiftInfo
{
    public function __construct(
        public Gift $gift,
        public ?string $ownedGiftId = null,
        public ?int $convertStarCount = null,
        public ?int $prepaidUpgradeStarCount = null,
        public ?bool $isUpgradeSeparate = null,
        public ?bool $canBeUpgraded = null,
        public ?string $text = null,
        public ?array $entities = null,
        public ?bool $isPrivate = null,
        public ?int $uniqueGiftNumber = null,
    ) {}

    public static function fromArray(array $data): self
    {
        return new self(
            gift: Gift::fromArray($data['gift']),
            ownedGiftId: $data['owned_gift_id'] ?? null,
            convertStarCount: $data['convert_star_count'] ?? null,
            prepaidUpgradeStarCount: $data['prepaid_upgrade_star_count'] ?? null,
            isUpgradeSeparate: $data['is_upgrade_separate'] ?? null,
            canBeUpgraded: $data['can_be_upgraded'] ?? null,
            text: $data['text'] ?? null,
            entities: isset($data['entities']) ? array_map(MessageEntity::fromArray(...), $data['entities']) : null,
            isPrivate: $data['is_private'] ?? null,
            uniqueGiftNumber: $data['unique_gift_number'] ?? null,
        );
    }
}
