<?php

declare(strict_types=1);

namespace Makhnanov\TelegramBot\Method;

use Makhnanov\TelegramBot\Type\Message;

trait SendAnimation
{
    public function sendAnimation(
        int|string $chatId,
        string $animation,
        ?string $businessConnectionId = null,
        ?int $messageThreadId = null,
        ?int $directMessagesTopicId = null,
        ?int $duration = null,
        ?int $width = null,
        ?int $height = null,
        ?string $thumbnail = null,
        ?string $caption = null,
        ?string $parseMode = null,
        ?array $captionEntities = null,
        ?bool $showCaptionAboveMedia = null,
        ?bool $hasSpoiler = null,
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
        $params['animation'] = $animation;
        if ($duration !== null) {
            $params['duration'] = $duration;
        }
        if ($width !== null) {
            $params['width'] = $width;
        }
        if ($height !== null) {
            $params['height'] = $height;
        }
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
        if ($showCaptionAboveMedia !== null) {
            $params['show_caption_above_media'] = $showCaptionAboveMedia;
        }
        if ($hasSpoiler !== null) {
            $params['has_spoiler'] = $hasSpoiler;
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

        $result = $this->api->call('sendAnimation', $params);

        return Message::fromArray($result);
    }
}
