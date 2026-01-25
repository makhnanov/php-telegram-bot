<?php

declare(strict_types=1);

namespace Makhnanov\TelegramBot\Method;

trait UnpinChatMessage
{
    public function unpinChatMessage(
        int|string $chatId,
        ?string $businessConnectionId = null,
        ?int $messageId = null,
    ): bool
    {
        $params = [];

        if ($businessConnectionId !== null) {
            $params['business_connection_id'] = $businessConnectionId;
        }
        $params['chat_id'] = $chatId;
        if ($messageId !== null) {
            $params['message_id'] = $messageId;
        }

        return $this->api->call('unpinChatMessage', $params);
    }
}
