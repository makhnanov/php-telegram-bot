<?php

declare(strict_types=1);

namespace Makhnanov\TelegramBot\Method;

trait SetChatPhoto
{
    public function setChatPhoto(
        int|string $chatId,
        string $photo,
    ): bool
    {
        $params = [];

        $params['chat_id'] = $chatId;
        $params['photo'] = $photo;

        return $this->api->call('setChatPhoto', $params);
    }
}
