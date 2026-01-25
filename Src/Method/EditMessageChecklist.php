<?php

declare(strict_types=1);

namespace Makhnanov\TelegramBot\Method;

use Makhnanov\TelegramBot\Type\Message;

trait EditMessageChecklist
{
    public function editMessageChecklist(
        string $businessConnectionId,
        int $chatId,
        int $messageId,
        InputChecklist $checklist,
        ?InlineKeyboardMarkup $replyMarkup = null,
    ): Message
    {
        $params = [];

        $params['business_connection_id'] = $businessConnectionId;
        $params['chat_id'] = $chatId;
        $params['message_id'] = $messageId;
        $params['checklist'] = $checklist;
        if ($replyMarkup !== null) {
            $params['reply_markup'] = $replyMarkup;
        }

        $result = $this->api->call('editMessageChecklist', $params);

        return Message::fromArray($result);
    }
}
