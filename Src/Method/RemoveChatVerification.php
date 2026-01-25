<?php

declare(strict_types=1);

namespace Makhnanov\TelegramBot\Method;

trait RemoveChatVerification
{
    public function removeChatVerification(
        int|string $chatId,
    ): bool
    {
        $params = [];

        $params['chat_id'] = $chatId;

        return $this->api->call('removeChatVerification', $params);
    }
}
