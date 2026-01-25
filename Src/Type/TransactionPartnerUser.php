<?php

declare(strict_types=1);

namespace Makhnanov\TelegramBot\Type;

readonly class TransactionPartnerUser
{
    public function __construct(
        public string $type,
        public string $transactionType,
        public User $user,
        public ?AffiliateInfo $affiliate = null,
        public ?string $invoicePayload = null,
        public ?int $subscriptionPeriod = null,
        public ?array $paidMedia = null,
        public ?string $paidMediaPayload = null,
        public ?Gift $gift = null,
        public ?int $premiumSubscriptionDuration = null,
    ) {}

    public static function fromArray(array $data): self
    {
        return new self(
            type: $data['type'],
            transactionType: $data['transaction_type'],
            user: User::fromArray($data['user']),
            affiliate: isset($data['affiliate']) ? AffiliateInfo::fromArray($data['affiliate']) : null,
            invoicePayload: $data['invoice_payload'] ?? null,
            subscriptionPeriod: $data['subscription_period'] ?? null,
            paidMedia: isset($data['paid_media']) ? array_map(PaidMedia::fromArray(...), $data['paid_media']) : null,
            paidMediaPayload: $data['paid_media_payload'] ?? null,
            gift: isset($data['gift']) ? Gift::fromArray($data['gift']) : null,
            premiumSubscriptionDuration: $data['premium_subscription_duration'] ?? null,
        );
    }
}
