<?php

declare(strict_types=1);

namespace Makhnanov\TelegramBot\Method;

trait DeclineSuggestedPost
{
    public function declineSuggestedPost(
        int $chatId,
        int $messageId,
        ?string $comment = null,
    ): bool
    {
        $params = [];

        $params['chat_id'] = $chatId;
        $params['message_id'] = $messageId;
        if ($comment !== null) {
            $params['comment'] = $comment;
        }

        return $this->api->call('declineSuggestedPost', $params);
    }
}
