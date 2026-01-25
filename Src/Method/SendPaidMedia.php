<?php

declare(strict_types=1);

namespace Makhnanov\TelegramBot\Method;

use Makhnanov\TelegramBot\Type\Message;

trait SendPaidMedia
{
    public function sendPaidMedia(
        int|string $chatId,
        int $starCount,
        array $media,
        ?string $businessConnectionId = null,
        ?int $messageThreadId = null,
        ?int $directMessagesTopicId = null,
        ?string $payload = null,
        ?string $caption = null,
        ?string $parseMode = null,
        ?array $captionEntities = null,
        ?bool $showCaptionAboveMedia = null,
        ?bool $disableNotification = null,
        ?bool $protectContent = null,
        ?bool $allowPaidBroadcast = null,
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
        $params['star_count'] = $starCount;
        $params['media'] = $media;
        if ($payload !== null) {
            $params['payload'] = $payload;
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
        if ($showCaptionAboveMedia !== null) {
            $params['show_caption_above_media'] = $showCaptionAboveMedia;
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
        if ($suggestedPostParameters !== null) {
            $params['suggested_post_parameters'] = $suggestedPostParameters;
        }
        if ($replyParameters !== null) {
            $params['reply_parameters'] = $replyParameters;
        }
        if ($replyMarkup !== null) {
            $params['reply_markup'] = $replyMarkup;
        }

        $result = $this->api->call('sendPaidMedia', $params);

        return Message::fromArray($result);
    }
}
