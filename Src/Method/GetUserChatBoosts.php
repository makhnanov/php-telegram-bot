<?php

declare(strict_types=1);

namespace Makhnanov\TelegramBot\Method;

use Makhnanov\TelegramBot\Type\UserChatBoosts;

trait GetUserChatBoosts
{
    public function getUserChatBoosts(
        int|string $chatId,
        int $userId,
    ): UserChatBoosts
    {
        $params = [];

        $params['chat_id'] = $chatId;
        $params['user_id'] = $userId;

        $result = $this->api->call('getUserChatBoosts', $params);

        return UserChatBoosts::fromArray($result);
    }
}
