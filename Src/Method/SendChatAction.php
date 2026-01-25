<?php

declare(strict_types=1);

namespace Makhnanov\TelegramBot\Method;

trait SendChatAction
{
    public function sendChatAction(
        int|string $chatId,
        string $action,
        ?string $businessConnectionId = null,
        ?int $messageThreadId = null,
    ): bool
    {
        $params = [];

        if ($businessConnectionId !== null) {
            $params['business_connection_id'] = $businessConnectionId;
        }
        $params['chat_id'] = $chatId;
        if ($messageThreadId !== null) {
            $params['message_thread_id'] = $messageThreadId;
        }
        $params['action'] = $action;

        return $this->api->call('sendChatAction', $params);
    }
}
