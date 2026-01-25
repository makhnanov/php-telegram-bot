<?php

declare(strict_types=1);

namespace Makhnanov\TelegramBot\Method;

trait RestrictChatMember
{
    public function restrictChatMember(
        int|string $chatId,
        int $userId,
        ChatPermissions $permissions,
        ?bool $useIndependentChatPermissions = null,
        ?int $untilDate = null,
    ): bool
    {
        $params = [];

        $params['chat_id'] = $chatId;
        $params['user_id'] = $userId;
        $params['permissions'] = $permissions;
        if ($useIndependentChatPermissions !== null) {
            $params['use_independent_chat_permissions'] = $useIndependentChatPermissions;
        }
        if ($untilDate !== null) {
            $params['until_date'] = $untilDate;
        }

        return $this->api->call('restrictChatMember', $params);
    }
}
