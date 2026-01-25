<?php

declare(strict_types=1);

namespace Makhnanov\TelegramBot\Method;

use Makhnanov\TelegramBot\Type\Message;

trait SendInvoice
{
    public function sendInvoice(
        int|string $chatId,
        string $title,
        string $description,
        string $payload,
        string $currency,
        array $prices,
        ?int $messageThreadId = null,
        ?int $directMessagesTopicId = null,
        ?string $providerToken = null,
        ?int $maxTipAmount = null,
        ?array $suggestedTipAmounts = null,
        ?string $startParameter = null,
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
        ?bool $disableNotification = null,
        ?bool $protectContent = null,
        ?bool $allowPaidBroadcast = null,
        ?string $messageEffectId = null,
        ?SuggestedPostParameters $suggestedPostParameters = null,
        ?ReplyParameters $replyParameters = null,
        ?InlineKeyboardMarkup $replyMarkup = null,
    ): Message
    {
        $params = [];

        $params['chat_id'] = $chatId;
        if ($messageThreadId !== null) {
            $params['message_thread_id'] = $messageThreadId;
        }
        if ($directMessagesTopicId !== null) {
            $params['direct_messages_topic_id'] = $directMessagesTopicId;
        }
        $params['title'] = $title;
        $params['description'] = $description;
        $params['payload'] = $payload;
        if ($providerToken !== null) {
            $params['provider_token'] = $providerToken;
        }
        $params['currency'] = $currency;
        $params['prices'] = $prices;
        if ($maxTipAmount !== null) {
            $params['max_tip_amount'] = $maxTipAmount;
        }
        if ($suggestedTipAmounts !== null) {
            $params['suggested_tip_amounts'] = $suggestedTipAmounts;
        }
        if ($startParameter !== null) {
            $params['start_parameter'] = $startParameter;
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
        if ($disableNotification !== null) {
            $params['disable_notification'] = $disableNotification;
        }
        if ($protectContent !== null) {
            $params['protect_content'] = $protectContent;
        }
        if ($allowPaidBroadcast !== null) {
            $params['allow_paid_broadcast'] = $allowPaidBroadcast;
        }
        if ($messageEffectId !== null) {
            $params['message_effect_id'] = $messageEffectId;
        }
        if ($suggestedPostParameters !== null) {
            $params['suggested_post_parameters'] = $suggestedPostParameters;
        }
        if ($replyParameters !== null) {
            $params['reply_parameters'] = $replyParameters;
        }
        if ($replyMarkup !== null) {
            $params['reply_markup'] = $replyMarkup;
        }

        $result = $this->api->call('sendInvoice', $params);

        return Message::fromArray($result);
    }
}
