<?php

declare(strict_types=1);

namespace Makhnanov\TelegramBot\Method;

trait PinChatMessage
{
    public function pinChatMessage(
        int|string $chatId,
        int $messageId,
        ?string $businessConnectionId = null,
        ?bool $disableNotification = null,
    ): bool
    {
        $params = [];

        if ($businessConnectionId !== null) {
            $params['business_connection_id'] = $businessConnectionId;
        }
        $params['chat_id'] = $chatId;
        $params['message_id'] = $messageId;
        if ($disableNotification !== null) {
            $params['disable_notification'] = $disableNotification;
        }

        return $this->api->call('pinChatMessage', $params);
    }
}
