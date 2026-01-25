<?php

declare(strict_types=1);

namespace Makhnanov\TelegramBot\Method;

trait UnbanChatMember
{
    public function unbanChatMember(
        int|string $chatId,
        int $userId,
        ?bool $onlyIfBanned = null,
    ): bool
    {
        $params = [];

        $params['chat_id'] = $chatId;
        $params['user_id'] = $userId;
        if ($onlyIfBanned !== null) {
            $params['only_if_banned'] = $onlyIfBanned;
        }

        return $this->api->call('unbanChatMember', $params);
    }
}
