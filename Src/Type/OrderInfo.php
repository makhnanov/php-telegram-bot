<?php

declare(strict_types=1);

namespace Makhnanov\TelegramBot\Type;

readonly class OrderInfo
{
    public function __construct(
        public ?string $name = null,
        public ?string $phoneNumber = null,
        public ?string $email = null,
        public ?ShippingAddress $shippingAddress = null,
    ) {}

    public static function fromArray(array $data): self
    {
        return new self(
            name: $data['name'] ?? null,
            phoneNumber: $data['phone_number'] ?? null,
            email: $data['email'] ?? null,
            shippingAddress: isset($data['shipping_address']) ? ShippingAddress::fromArray($data['shipping_address']) : null,
        );
    }
}
