<?php

declare(strict_types=1);

namespace Makhnanov\TelegramBot\Type;

readonly class GiveawayWinners
{
    public function __construct(
        public Chat $chat,
        public int $giveawayMessageId,
        public int $winnersSelectionDate,
        public int $winnerCount,
        public array $winners,
        public ?int $additionalChatCount = null,
        public ?int $prizeStarCount = null,
        public ?int $premiumSubscriptionMonthCount = null,
        public ?int $unclaimedPrizeCount = null,
        public ?bool $onlyNewMembers = null,
        public ?bool $wasRefunded = null,
        public ?string $prizeDescription = null,
    ) {}

    public static function fromArray(array $data): self
    {
        return new self(
            chat: Chat::fromArray($data['chat']),
            giveawayMessageId: $data['giveaway_message_id'],
            winnersSelectionDate: $data['winners_selection_date'],
            winnerCount: $data['winner_count'],
            winners: array_map(User::fromArray(...), $data['winners']),
            additionalChatCount: $data['additional_chat_count'] ?? null,
            prizeStarCount: $data['prize_star_count'] ?? null,
            premiumSubscriptionMonthCount: $data['premium_subscription_month_count'] ?? null,
            unclaimedPrizeCount: $data['unclaimed_prize_count'] ?? null,
            onlyNewMembers: $data['only_new_members'] ?? null,
            wasRefunded: $data['was_refunded'] ?? null,
            prizeDescription: $data['prize_description'] ?? null,
        );
    }
}
