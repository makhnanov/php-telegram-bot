<?php

declare(strict_types=1);

namespace Makhnanov\TelegramBot\Method;

use Makhnanov\TelegramBot\Type\Poll;

trait StopPoll
{
    public function stopPoll(
        int|string $chatId,
        int $messageId,
        ?string $businessConnectionId = null,
        ?InlineKeyboardMarkup $replyMarkup = null,
    ): Poll
    {
        $params = [];

        if ($businessConnectionId !== null) {
            $params['business_connection_id'] = $businessConnectionId;
        }
        $params['chat_id'] = $chatId;
        $params['message_id'] = $messageId;
        if ($replyMarkup !== null) {
            $params['reply_markup'] = $replyMarkup;
        }

        $result = $this->api->call('stopPoll', $params);

        return Poll::fromArray($result);
    }
}
