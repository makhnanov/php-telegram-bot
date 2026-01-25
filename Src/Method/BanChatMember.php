<?php

declare(strict_types=1);

namespace Makhnanov\TelegramBot\Method;

trait BanChatMember
{
    public function banChatMember(
        int|string $chatId,
        int $userId,
        ?int $untilDate = null,
        ?bool $revokeMessages = null,
    ): bool
    {
        $params = [];

        $params['chat_id'] = $chatId;
        $params['user_id'] = $userId;
        if ($untilDate !== null) {
            $params['until_date'] = $untilDate;
        }
        if ($revokeMessages !== null) {
            $params['revoke_messages'] = $revokeMessages;
        }

        return $this->api->call('banChatMember', $params);
    }
}
