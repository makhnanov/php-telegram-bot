<?php

declare(strict_types=1);

namespace Makhnanov\TelegramBot\Method;

use Makhnanov\TelegramBot\Type\Message;

trait EditMessageMedia
{
    public function editMessageMedia(
        InputMedia $media,
        ?string $businessConnectionId = null,
        int|string|null $chatId = null,
        ?int $messageId = null,
        ?string $inlineMessageId = null,
        ?InlineKeyboardMarkup $replyMarkup = null,
    ): Message
    {
        $params = [];

        if ($businessConnectionId !== null) {
            $params['business_connection_id'] = $businessConnectionId;
        }
        if ($chatId !== null) {
            $params['chat_id'] = $chatId;
        }
        if ($messageId !== null) {
            $params['message_id'] = $messageId;
        }
        if ($inlineMessageId !== null) {
            $params['inline_message_id'] = $inlineMessageId;
        }
        $params['media'] = $media;
        if ($replyMarkup !== null) {
            $params['reply_markup'] = $replyMarkup;
        }

        $result = $this->api->call('editMessageMedia', $params);

        return Message::fromArray($result);
    }
}
