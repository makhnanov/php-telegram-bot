<?php

declare(strict_types=1);

namespace Makhnanov\TelegramBot\Method;

trait DeleteMessage
{
    public function deleteMessage(
        int|string $chatId,
        int $messageId,
    ): bool
    {
        $params = [];

        $params['chat_id'] = $chatId;
        $params['message_id'] = $messageId;

        return $this->api->call('deleteMessage', $params);
    }
}
