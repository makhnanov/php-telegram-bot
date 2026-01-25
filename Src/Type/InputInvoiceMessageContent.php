<?php

declare(strict_types=1);

namespace Makhnanov\TelegramBot\Type;

readonly class InputInvoiceMessageContent
{
    public function __construct(
        public string $title,
        public string $description,
        public string $payload,
        public string $currency,
        public array $prices,
        public ?string $providerToken = null,
        public ?int $maxTipAmount = null,
        public ?array $suggestedTipAmounts = null,
        public ?string $providerData = null,
        public ?string $photoUrl = null,
        public ?int $photoSize = null,
        public ?int $photoWidth = null,
        public ?int $photoHeight = null,
        public ?bool $needName = null,
        public ?bool $needPhoneNumber = null,
        public ?bool $needEmail = null,
        public ?bool $needShippingAddress = null,
        public ?bool $sendPhoneNumberToProvider = null,
        public ?bool $sendEmailToProvider = null,
        public ?bool $isFlexible = null,
    ) {}

    public static function fromArray(array $data): self
    {
        return new self(
            title: $data['title'],
            description: $data['description'],
            payload: $data['payload'],
            providerToken: $data['provider_token'] ?? null,
            currency: $data['currency'],
            prices: array_map(LabeledPrice::fromArray(...), $data['prices']),
            maxTipAmount: $data['max_tip_amount'] ?? null,
            suggestedTipAmounts: $data['suggested_tip_amounts'] ?? null,
            providerData: $data['provider_data'] ?? null,
            photoUrl: $data['photo_url'] ?? null,
            photoSize: $data['photo_size'] ?? null,
            photoWidth: $data['photo_width'] ?? null,
            photoHeight: $data['photo_height'] ?? null,
            needName: $data['need_name'] ?? null,
            needPhoneNumber: $data['need_phone_number'] ?? null,
            needEmail: $data['need_email'] ?? null,
            needShippingAddress: $data['need_shipping_address'] ?? null,
            sendPhoneNumberToProvider: $data['send_phone_number_to_provider'] ?? null,
            sendEmailToProvider: $data['send_email_to_provider'] ?? null,
            isFlexible: $data['is_flexible'] ?? null,
        );
    }
}
