<?php

declare(strict_types=1);

namespace Makhnanov\TelegramBot\Method;

trait UnbanChatSenderChat
{
    public function unbanChatSenderChat(
        int|string $chatId,
        int $senderChatId,
    ): bool
    {
        $params = [];

        $params['chat_id'] = $chatId;
        $params['sender_chat_id'] = $senderChatId;

        return $this->api->call('unbanChatSenderChat', $params);
    }
}
