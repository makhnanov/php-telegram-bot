<?php

declare(strict_types=1);

namespace Makhnanov\TelegramBot\Type;

readonly class ChatInviteLink
{
    public function __construct(
        public string $inviteLink,
        public User $creator,
        public bool $createsJoinRequest,
        public bool $isPrimary,
        public bool $isRevoked,
        public ?string $name = null,
        public ?int $expireDate = null,
        public ?int $memberLimit = null,
        public ?int $pendingJoinRequestCount = null,
        public ?int $subscriptionPeriod = null,
        public ?int $subscriptionPrice = null,
    ) {}

    public static function fromArray(array $data): self
    {
        return new self(
            inviteLink: $data['invite_link'],
            creator: User::fromArray($data['creator']),
            createsJoinRequest: $data['creates_join_request'],
            isPrimary: $data['is_primary'],
            isRevoked: $data['is_revoked'],
            name: $data['name'] ?? null,
            expireDate: $data['expire_date'] ?? null,
            memberLimit: $data['member_limit'] ?? null,
            pendingJoinRequestCount: $data['pending_join_request_count'] ?? null,
            subscriptionPeriod: $data['subscription_period'] ?? null,
            subscriptionPrice: $data['subscription_price'] ?? null,
        );
    }
}
