<?php

declare(strict_types=1);

namespace Makhnanov\TelegramBot\Method;

trait CopyMessages
{
    public function copyMessages(
        int|string $chatId,
        int|string $fromChatId,
        array $messageIds,
        ?int $messageThreadId = null,
        ?int $directMessagesTopicId = null,
        ?bool $disableNotification = null,
        ?bool $protectContent = null,
        ?bool $removeCaption = null,
    ): array
    {
        $params = [];

        $params['chat_id'] = $chatId;
        if ($messageThreadId !== null) {
            $params['message_thread_id'] = $messageThreadId;
        }
        if ($directMessagesTopicId !== null) {
            $params['direct_messages_topic_id'] = $directMessagesTopicId;
        }
        $params['from_chat_id'] = $fromChatId;
        $params['message_ids'] = $messageIds;
        if ($disableNotification !== null) {
            $params['disable_notification'] = $disableNotification;
        }
        if ($protectContent !== null) {
            $params['protect_content'] = $protectContent;
        }
        if ($removeCaption !== null) {
            $params['remove_caption'] = $removeCaption;
        }

        return $this->api->call('copyMessages', $params);
    }
}
