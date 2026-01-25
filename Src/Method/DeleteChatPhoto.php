<?php

declare(strict_types=1);

namespace Makhnanov\TelegramBot\Method;

trait DeleteChatPhoto
{
    public function deleteChatPhoto(
        int|string $chatId,
    ): bool
    {
        $params = [];

        $params['chat_id'] = $chatId;

        return $this->api->call('deleteChatPhoto', $params);
    }
}
