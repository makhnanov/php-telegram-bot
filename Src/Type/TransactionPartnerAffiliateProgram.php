<?php

declare(strict_types=1);

namespace Makhnanov\TelegramBot\Type;

readonly class TransactionPartnerAffiliateProgram
{
    public function __construct(
        public string $type,
        public int $commissionPerMille,
        public ?User $sponsorUser = null,
    ) {}

    public static function fromArray(array $data): self
    {
        return new self(
            type: $data['type'],
            sponsorUser: isset($data['sponsor_user']) ? User::fromArray($data['sponsor_user']) : null,
            commissionPerMille: $data['commission_per_mille'],
        );
    }
}
