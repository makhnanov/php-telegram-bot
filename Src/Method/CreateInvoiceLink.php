<?php

declare(strict_types=1);

namespace Makhnanov\TelegramBot\Method;

trait CreateInvoiceLink
{
    public function createInvoiceLink(
        string $title,
        string $description,
        string $payload,
        string $currency,
        array $prices,
        ?string $businessConnectionId = null,
        ?string $providerToken = null,
        ?int $subscriptionPeriod = null,
        ?int $maxTipAmount = null,
        ?array $suggestedTipAmounts = null,
        ?string $providerData = null,
        ?string $photoUrl = null,
        ?int $photoSize = null,
        ?int $photoWidth = null,
        ?int $photoHeight = null,
        ?bool $needName = null,
        ?bool $needPhoneNumber = null,
        ?bool $needEmail = null,
        ?bool $needShippingAddress = null,
        ?bool $sendPhoneNumberToProvider = null,
        ?bool $sendEmailToProvider = null,
        ?bool $isFlexible = null,
    ): string
    {
        $params = [];

        if ($businessConnectionId !== null) {
            $params['business_connection_id'] = $businessConnectionId;
        }
        $params['title'] = $title;
        $params['description'] = $description;
        $params['payload'] = $payload;
        if ($providerToken !== null) {
            $params['provider_token'] = $providerToken;
        }
        $params['currency'] = $currency;
        $params['prices'] = $prices;
        if ($subscriptionPeriod !== null) {
            $params['subscription_period'] = $subscriptionPeriod;
        }
        if ($maxTipAmount !== null) {
            $params['max_tip_amount'] = $maxTipAmount;
        }
        if ($suggestedTipAmounts !== null) {
            $params['suggested_tip_amounts'] = $suggestedTipAmounts;
        }
        if ($providerData !== null) {
            $params['provider_data'] = $providerData;
        }
        if ($photoUrl !== null) {
            $params['photo_url'] = $photoUrl;
        }
        if ($photoSize !== null) {
            $params['photo_size'] = $photoSize;
        }
        if ($photoWidth !== null) {
            $params['photo_width'] = $photoWidth;
        }
        if ($photoHeight !== null) {
            $params['photo_height'] = $photoHeight;
        }
        if ($needName !== null) {
            $params['need_name'] = $needName;
        }
        if ($needPhoneNumber !== null) {
            $params['need_phone_number'] = $needPhoneNumber;
        }
        if ($needEmail !== null) {
            $params['need_email'] = $needEmail;
        }
        if ($needShippingAddress !== null) {
            $params['need_shipping_address'] = $needShippingAddress;
        }
        if ($sendPhoneNumberToProvider !== null) {
            $params['send_phone_number_to_provider'] = $sendPhoneNumberToProvider;
        }
        if ($sendEmailToProvider !== null) {
            $params['send_email_to_provider'] = $sendEmailToProvider;
        }
        if ($isFlexible !== null) {
            $params['is_flexible'] = $isFlexible;
        }

        return $this->api->call('createInvoiceLink', $params);
    }
}
