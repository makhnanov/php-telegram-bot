<?php

declare(strict_types=1);

namespace Makhnanov\TelegramBot\Method;

trait ExportChatInviteLink
{
    public function exportChatInviteLink(
        int|string $chatId,
    ): string
    {
        $params = [];

        $params['chat_id'] = $chatId;

        return $this->api->call('exportChatInviteLink', $params);
    }
}
