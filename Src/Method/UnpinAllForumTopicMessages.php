<?php

declare(strict_types=1);

namespace Makhnanov\TelegramBot\Method;

trait UnpinAllForumTopicMessages
{
    public function unpinAllForumTopicMessages(
        int|string $chatId,
        int $messageThreadId,
    ): bool
    {
        $params = [];

        $params['chat_id'] = $chatId;
        $params['message_thread_id'] = $messageThreadId;

        return $this->api->call('unpinAllForumTopicMessages', $params);
    }
}
