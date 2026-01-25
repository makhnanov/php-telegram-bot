<?php

declare(strict_types=1);

namespace Makhnanov\TelegramBot\Method;

trait SetChatDescription
{
    public function setChatDescription(
        int|string $chatId,
        ?string $description = null,
    ): bool
    {
        $params = [];

        $params['chat_id'] = $chatId;
        if ($description !== null) {
            $params['description'] = $description;
        }

        return $this->api->call('setChatDescription', $params);
    }
}
