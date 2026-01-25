<?php

declare(strict_types=1);

namespace Makhnanov\TelegramBot\Type;

readonly class AcceptedGiftTypes
{
    public function __construct(
        public bool $unlimitedGifts,
        public bool $limitedGifts,
        public bool $uniqueGifts,
        public bool $premiumSubscription,
        public bool $giftsFromChannels,
    ) {}

    public static function fromArray(array $data): self
    {
        return new self(
            unlimitedGifts: $data['unlimited_gifts'],
            limitedGifts: $data['limited_gifts'],
            uniqueGifts: $data['unique_gifts'],
            premiumSubscription: $data['premium_subscription'],
            giftsFromChannels: $data['gifts_from_channels'],
        );
    }
}
