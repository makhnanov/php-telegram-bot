<?php

declare(strict_types=1);

namespace Makhnanov\TelegramBot\Type;

readonly class SuccessfulPayment
{
    public function __construct(
        public string $currency,
        public int $totalAmount,
        public string $invoicePayload,
        public string $telegramPaymentChargeId,
        public string $providerPaymentChargeId,
        public ?int $subscriptionExpirationDate = null,
        public ?bool $isRecurring = null,
        public ?bool $isFirstRecurring = null,
        public ?string $shippingOptionId = null,
        public ?OrderInfo $orderInfo = null,
    ) {}

    public static function fromArray(array $data): self
    {
        return new self(
            currency: $data['currency'],
            totalAmount: $data['total_amount'],
            invoicePayload: $data['invoice_payload'],
            subscriptionExpirationDate: $data['subscription_expiration_date'] ?? null,
            isRecurring: $data['is_recurring'] ?? null,
            isFirstRecurring: $data['is_first_recurring'] ?? null,
            shippingOptionId: $data['shipping_option_id'] ?? null,
            orderInfo: isset($data['order_info']) ? OrderInfo::fromArray($data['order_info']) : null,
            telegramPaymentChargeId: $data['telegram_payment_charge_id'],
            providerPaymentChargeId: $data['provider_payment_charge_id'],
        );
    }
}
