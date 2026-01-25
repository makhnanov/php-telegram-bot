<?php

declare(strict_types=1);

namespace Makhnanov\TelegramBot\Method;

use Makhnanov\TelegramBot\Type\Message;

trait EditMessageLiveLocation
{
    public function editMessageLiveLocation(
        float $latitude,
        float $longitude,
        ?string $businessConnectionId = null,
        int|string|null $chatId = null,
        ?int $messageId = null,
        ?string $inlineMessageId = null,
        ?int $livePeriod = null,
        ?float $horizontalAccuracy = null,
        ?int $heading = null,
        ?int $proximityAlertRadius = null,
        ?InlineKeyboardMarkup $replyMarkup = null,
    ): Message
    {
        $params = [];

        if ($businessConnectionId !== null) {
            $params['business_connection_id'] = $businessConnectionId;
        }
        if ($chatId !== null) {
            $params['chat_id'] = $chatId;
        }
        if ($messageId !== null) {
            $params['message_id'] = $messageId;
        }
        if ($inlineMessageId !== null) {
            $params['inline_message_id'] = $inlineMessageId;
        }
        $params['latitude'] = $latitude;
        $params['longitude'] = $longitude;
        if ($livePeriod !== null) {
            $params['live_period'] = $livePeriod;
        }
        if ($horizontalAccuracy !== null) {
            $params['horizontal_accuracy'] = $horizontalAccuracy;
        }
        if ($heading !== null) {
            $params['heading'] = $heading;
        }
        if ($proximityAlertRadius !== null) {
            $params['proximity_alert_radius'] = $proximityAlertRadius;
        }
        if ($replyMarkup !== null) {
            $params['reply_markup'] = $replyMarkup;
        }

        $result = $this->api->call('editMessageLiveLocation', $params);

        return Message::fromArray($result);
    }
}
