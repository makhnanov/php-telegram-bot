<?php

declare(strict_types=1);

namespace Makhnanov\TelegramBot\Method;

trait SetChatTitle
{
    public function setChatTitle(
        int|string $chatId,
        string $title,
    ): bool
    {
        $params = [];

        $params['chat_id'] = $chatId;
        $params['title'] = $title;

        return $this->api->call('setChatTitle', $params);
    }
}
