<?php

declare(strict_types=1);

namespace Makhnanov\TelegramBot\Method;

trait GetChatAdministrators
{
    public function getChatAdministrators(
        int|string $chatId,
    ): array
    {
        $params = [];

        $params['chat_id'] = $chatId;

        return $this->api->call('getChatAdministrators', $params);
    }
}
