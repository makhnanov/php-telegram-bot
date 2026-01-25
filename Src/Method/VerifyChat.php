<?php

declare(strict_types=1);

namespace Makhnanov\TelegramBot\Method;

trait VerifyChat
{
    public function verifyChat(
        int|string $chatId,
        ?string $customDescription = null,
    ): bool
    {
        $params = [];

        $params['chat_id'] = $chatId;
        if ($customDescription !== null) {
            $params['custom_description'] = $customDescription;
        }

        return $this->api->call('verifyChat', $params);
    }
}
