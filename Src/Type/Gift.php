<?php

declare(strict_types=1);

namespace Makhnanov\TelegramBot\Type;

readonly class Gift
{
    public function __construct(
        public string $id,
        public Sticker $sticker,
        public int $starCount,
        public ?int $upgradeStarCount = null,
        public ?bool $isPremium = null,
        public ?bool $hasColors = null,
        public ?int $totalCount = null,
        public ?int $remainingCount = null,
        public ?int $personalTotalCount = null,
        public ?int $personalRemainingCount = null,
        public ?GiftBackground $background = null,
        public ?int $uniqueGiftVariantCount = null,
        public ?Chat $publisherChat = null,
    ) {}

    public static function fromArray(array $data): self
    {
        return new self(
            id: $data['id'],
            sticker: Sticker::fromArray($data['sticker']),
            starCount: $data['star_count'],
            upgradeStarCount: $data['upgrade_star_count'] ?? null,
            isPremium: $data['is_premium'] ?? null,
            hasColors: $data['has_colors'] ?? null,
            totalCount: $data['total_count'] ?? null,
            remainingCount: $data['remaining_count'] ?? null,
            personalTotalCount: $data['personal_total_count'] ?? null,
            personalRemainingCount: $data['personal_remaining_count'] ?? null,
            background: isset($data['background']) ? GiftBackground::fromArray($data['background']) : null,
            uniqueGiftVariantCount: $data['unique_gift_variant_count'] ?? null,
            publisherChat: isset($data['publisher_chat']) ? Chat::fromArray($data['publisher_chat']) : null,
        );
    }
}
