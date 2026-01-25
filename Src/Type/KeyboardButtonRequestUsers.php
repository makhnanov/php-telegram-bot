<?php

declare(strict_types=1);

namespace Makhnanov\TelegramBot\Type;

readonly class KeyboardButtonRequestUsers
{
    public function __construct(
        public int $requestId,
        public ?bool $userIsBot = null,
        public ?bool $userIsPremium = null,
        public ?int $maxQuantity = null,
        public ?bool $requestName = null,
        public ?bool $requestUsername = null,
        public ?bool $requestPhoto = null,
    ) {}

    public static function fromArray(array $data): self
    {
        return new self(
            requestId: $data['request_id'],
            userIsBot: $data['user_is_bot'] ?? null,
            userIsPremium: $data['user_is_premium'] ?? null,
            maxQuantity: $data['max_quantity'] ?? null,
            requestName: $data['request_name'] ?? null,
            requestUsername: $data['request_username'] ?? null,
            requestPhoto: $data['request_photo'] ?? null,
        );
    }
}
