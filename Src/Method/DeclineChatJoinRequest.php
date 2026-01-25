<?php

declare(strict_types=1);

namespace Makhnanov\TelegramBot\Method;

trait DeclineChatJoinRequest
{
    public function declineChatJoinRequest(
        int|string $chatId,
        int $userId,
    ): bool
    {
        $params = [];

        $params['chat_id'] = $chatId;
        $params['user_id'] = $userId;

        return $this->api->call('declineChatJoinRequest', $params);
    }
}
