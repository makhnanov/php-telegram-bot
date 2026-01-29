<?php

declare(strict_types=1);

namespace Makhnanov\TelegramBot\Method;

use Makhnanov\TelegramBot\Type\Message;

trait SendMessage
{
    public function sendMessage(
        int|string $chatId,
        string $text,
        ?string $businessConnectionId = null,
        ?int $messageThreadId = null,
        ?string $parseMode = null,
        ?array $entities = null,
        ?array $linkPreviewOptions = null,
        ?bool $disableNotification = null,
        ?bool $protectContent = null,
        ?bool $allowPaidBroadcast = null,
        ?string $messageEffectId = null,
        ?array $replyParameters = null,
        InlineKeyboardMarkup|array|null $replyMarkup = null,
    ): Message {
        $params = [
            'chat_id' => $chatId,
            'text' => $text,
        ];

        if ($businessConnectionId !== null) {
            $params['business_connection_id'] = $businessConnectionId;
        }
        if ($messageThreadId !== null) {
            $params['message_thread_id'] = $messageThreadId;
        }
        if ($parseMode !== null) {
            $params['parse_mode'] = $parseMode;
        }
        if ($entities !== null) {
            $params['entities'] = $entities;
        }
        if ($linkPreviewOptions !== null) {
            $params['link_preview_options'] = $linkPreviewOptions;
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
        if ($replyParameters !== null) {
            $params['reply_parameters'] = $replyParameters;
        }
        if ($replyMarkup !== null) {
            $params['reply_markup'] = $replyMarkup;
        }

        $result = $this->api->call('sendMessage', $params);

        return Message::fromArray($result);
    }
}
