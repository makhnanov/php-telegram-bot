<?php

declare(strict_types=1);

namespace Makhnanov\TelegramBot\Type;

readonly class AffiliateInfo
{
    public function __construct(
        public int $commissionPerMille,
        public int $amount,
        public ?User $affiliateUser = null,
        public ?Chat $affiliateChat = null,
        public ?int $nanostarAmount = null,
    ) {}

    public static function fromArray(array $data): self
    {
        return new self(
            affiliateUser: isset($data['affiliate_user']) ? User::fromArray($data['affiliate_user']) : null,
            affiliateChat: isset($data['affiliate_chat']) ? Chat::fromArray($data['affiliate_chat']) : null,
            commissionPerMille: $data['commission_per_mille'],
            amount: $data['amount'],
            nanostarAmount: $data['nanostar_amount'] ?? null,
        );
    }
}
