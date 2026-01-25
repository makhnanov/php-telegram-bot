<?php

declare(strict_types=1);

namespace Makhnanov\TelegramBot\Type;

readonly class Giveaway
{
    public function __construct(
        public array $chats,
        public int $winnersSelectionDate,
        public int $winnerCount,
        public ?bool $onlyNewMembers = null,
        public ?bool $hasPublicWinners = null,
        public ?string $prizeDescription = null,
        public ?array $countryCodes = null,
        public ?int $prizeStarCount = null,
        public ?int $premiumSubscriptionMonthCount = null,
    ) {}

    public static function fromArray(array $data): self
    {
        return new self(
            chats: array_map(Chat::fromArray(...), $data['chats']),
            winnersSelectionDate: $data['winners_selection_date'],
            winnerCount: $data['winner_count'],
            onlyNewMembers: $data['only_new_members'] ?? null,
            hasPublicWinners: $data['has_public_winners'] ?? null,
            prizeDescription: $data['prize_description'] ?? null,
            countryCodes: $data['country_codes'] ?? null,
            prizeStarCount: $data['prize_star_count'] ?? null,
            premiumSubscriptionMonthCount: $data['premium_subscription_month_count'] ?? null,
        );
    }
}
