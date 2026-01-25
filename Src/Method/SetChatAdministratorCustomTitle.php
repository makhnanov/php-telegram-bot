<?php

declare(strict_types=1);

namespace Makhnanov\TelegramBot\Method;

trait SetChatAdministratorCustomTitle
{
    public function setChatAdministratorCustomTitle(
        int|string $chatId,
        int $userId,
        string $customTitle,
    ): bool
    {
        $params = [];

        $params['chat_id'] = $chatId;
        $params['user_id'] = $userId;
        $params['custom_title'] = $customTitle;

        return $this->api->call('setChatAdministratorCustomTitle', $params);
    }
}
