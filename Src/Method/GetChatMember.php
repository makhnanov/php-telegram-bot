<?php

declare(strict_types=1);

namespace Makhnanov\TelegramBot\Method;

use Makhnanov\TelegramBot\Type\ChatMember;

trait GetChatMember
{
    public function getChatMember(
        int|string $chatId,
        int $userId,
    ): ChatMember
    {
        $params = [];

        $params['chat_id'] = $chatId;
        $params['user_id'] = $userId;

        $result = $this->api->call('getChatMember', $params);

        return ChatMember::fromArray($result);
    }
}
