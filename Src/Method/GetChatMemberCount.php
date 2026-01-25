<?php

declare(strict_types=1);

namespace Makhnanov\TelegramBot\Method;

trait GetChatMemberCount
{
    public function getChatMemberCount(
        int|string $chatId,
    ): int
    {
        $params = [];

        $params['chat_id'] = $chatId;

        return $this->api->call('getChatMemberCount', $params);
    }
}
