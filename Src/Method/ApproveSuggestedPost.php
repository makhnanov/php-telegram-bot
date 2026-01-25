<?php

declare(strict_types=1);

namespace Makhnanov\TelegramBot\Method;

trait ApproveSuggestedPost
{
    public function approveSuggestedPost(
        int $chatId,
        int $messageId,
        ?int $sendDate = null,
    ): bool
    {
        $params = [];

        $params['chat_id'] = $chatId;
        $params['message_id'] = $messageId;
        if ($sendDate !== null) {
            $params['send_date'] = $sendDate;
        }

        return $this->api->call('approveSuggestedPost', $params);
    }
}
