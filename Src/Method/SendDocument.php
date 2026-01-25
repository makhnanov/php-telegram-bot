<?php

declare(strict_types=1);

namespace Makhnanov\TelegramBot\Method;

use Makhnanov\TelegramBot\Type\Message;

trait SendDocument
{
    public function sendDocument(
        int|string $chatId,
        string $document,
        ?string $businessConnectionId = null,
        ?int $messageThreadId = null,
        ?int $directMessagesTopicId = null,
        ?string $thumbnail = null,
        ?string $caption = null,
        ?string $parseMode = null,
        ?array $captionEntities = null,
        ?bool $disableContentTypeDetection = null,
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

        if ($businessConnectionId !== null) {
            $params['business_connection_id'] = $businessConnectionId;
        }
        $params['chat_id'] = $chatId;
        if ($messageThreadId !== null) {
            $params['message_thread_id'] = $messageThreadId;
        }
        if ($directMessagesTopicId !== null) {
            $params['direct_messages_topic_id'] = $directMessagesTopicId;
        }
        $params['document'] = $document;
        if ($thumbnail !== null) {
            $params['thumbnail'] = $thumbnail;
        }
        if ($caption !== null) {
            $params['caption'] = $caption;
        }
        if ($parseMode !== null) {
            $params['parse_mode'] = $parseMode;
        }
        if ($captionEntities !== null) {
            $params['caption_entities'] = $captionEntities;
        }
        if ($disableContentTypeDetection !== null) {
            $params['disable_content_type_detection'] = $disableContentTypeDetection;
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

        $result = $this->api->call('sendDocument', $params);

        return Message::fromArray($result);
    }
}
