<?php

declare(strict_types=1);

namespace Makhnanov\TelegramBot\Method;

trait ReadBusinessMessage
{
    public function readBusinessMessage(
        string $businessConnectionId,
        int $chatId,
        int $messageId,
    ): bool
    {
        $params = [];

        $params['business_connection_id'] = $businessConnectionId;
        $params['chat_id'] = $chatId;
        $params['message_id'] = $messageId;

        return $this->api->call('readBusinessMessage', $params);
    }
}
