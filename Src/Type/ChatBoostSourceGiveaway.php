<?php

declare(strict_types=1);

namespace Makhnanov\TelegramBot\Type;

readonly class ChatBoostSourceGiveaway
{
    public function __construct(
        public string $source,
        public int $giveawayMessageId,
        public ?User $user = null,
        public ?int $prizeStarCount = null,
        public ?bool $isUnclaimed = null,
    ) {}

    public static function fromArray(array $data): self
    {
        return new self(
            source: $data['source'],
            giveawayMessageId: $data['giveaway_message_id'],
            user: isset($data['user']) ? User::fromArray($data['user']) : null,
            prizeStarCount: $data['prize_star_count'] ?? null,
            isUnclaimed: $data['is_unclaimed'] ?? null,
        );
    }
}
