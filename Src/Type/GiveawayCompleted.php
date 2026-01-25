<?php

declare(strict_types=1);

namespace Makhnanov\TelegramBot\Type;

readonly class GiveawayCompleted
{
    public function __construct(
        public int $winnerCount,
        public ?int $unclaimedPrizeCount = null,
        public ?Message $giveawayMessage = null,
        public ?bool $isStarGiveaway = null,
    ) {}

    public static function fromArray(array $data): self
    {
        return new self(
            winnerCount: $data['winner_count'],
            unclaimedPrizeCount: $data['unclaimed_prize_count'] ?? null,
            giveawayMessage: isset($data['giveaway_message']) ? Message::fromArray($data['giveaway_message']) : null,
            isStarGiveaway: $data['is_star_giveaway'] ?? null,
        );
    }
}
