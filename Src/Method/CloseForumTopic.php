<?php

declare(strict_types=1);

namespace Makhnanov\TelegramBot\Method;

trait CloseForumTopic
{
    public function closeForumTopic(
        int|string $chatId,
        int $messageThreadId,
    ): bool
    {
        $params = [];

        $params['chat_id'] = $chatId;
        $params['message_thread_id'] = $messageThreadId;

        return $this->api->call('closeForumTopic', $params);
    }
}
