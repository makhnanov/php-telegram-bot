<?php

declare(strict_types=1);

namespace Makhnanov\TelegramBot\Method;

trait SetChatPermissions
{
    public function setChatPermissions(
        int|string $chatId,
        ChatPermissions $permissions,
        ?bool $useIndependentChatPermissions = null,
    ): bool
    {
        $params = [];

        $params['chat_id'] = $chatId;
        $params['permissions'] = $permissions;
        if ($useIndependentChatPermissions !== null) {
            $params['use_independent_chat_permissions'] = $useIndependentChatPermissions;
        }

        return $this->api->call('setChatPermissions', $params);
    }
}
