<?php

declare(strict_types=1);

namespace Makhnanov\TelegramBot\Type;

readonly class ShippingQuery
{
    public function __construct(
        public string $id,
        public User $from,
        public string $invoicePayload,
        public ShippingAddress $shippingAddress,
    ) {}

    public static function fromArray(array $data): self
    {
        return new self(
            id: $data['id'],
            from: User::fromArray($data['from']),
            invoicePayload: $data['invoice_payload'],
            shippingAddress: ShippingAddress::fromArray($data['shipping_address']),
        );
    }
}
