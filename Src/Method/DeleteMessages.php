<?php

declare(strict_types=1);

namespace Makhnanov\TelegramBot\Method;

trait DeleteMessages
{
    public function deleteMessages(
        int|string $chatId,
        array $messageIds,
    ): bool
    {
        $params = [];

        $params['chat_id'] = $chatId;
        $params['message_ids'] = $messageIds;

        return $this->api->call('deleteMessages', $params);
    }
}
