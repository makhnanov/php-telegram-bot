<?php

declare(strict_types=1);

namespace Makhnanov\TelegramBot\Method;

use Makhnanov\TelegramBot\Type\Message;

trait SendVideoNote
{
    public function sendVideoNote(
        int|string $chatId,
        string $videoNote,
        ?string $businessConnectionId = null,
        ?int $messageThreadId = null,
        ?int $directMessagesTopicId = null,
        ?int $duration = null,
        ?int $length = null,
        ?string $thumbnail = null,
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
        $params['video_note'] = $videoNote;
        if ($duration !== null) {
            $params['duration'] = $duration;
        }
        if ($length !== null) {
            $params['length'] = $length;
        }
        if ($thumbnail !== null) {
            $params['thumbnail'] = $thumbnail;
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

        $result = $this->api->call('sendVideoNote', $params);

        return Message::fromArray($result);
    }
}
