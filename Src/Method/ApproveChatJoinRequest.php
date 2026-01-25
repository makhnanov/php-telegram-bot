<?php

declare(strict_types=1);

namespace Makhnanov\TelegramBot\Method;

trait ApproveChatJoinRequest
{
    public function approveChatJoinRequest(
        int|string $chatId,
        int $userId,
    ): bool
    {
        $params = [];

        $params['chat_id'] = $chatId;
        $params['user_id'] = $userId;

        return $this->api->call('approveChatJoinRequest', $params);
    }
}
