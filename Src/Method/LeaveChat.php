<?php

declare(strict_types=1);

namespace Makhnanov\TelegramBot\Method;

trait LeaveChat
{
    public function leaveChat(
        int|string $chatId,
    ): bool
    {
        $params = [];

        $params['chat_id'] = $chatId;

        return $this->api->call('leaveChat', $params);
    }
}
