<?php

declare(strict_types=1);

namespace Makhnanov\TelegramBot\Method;

use Makhnanov\TelegramBot\Type\Message;

trait SendMessage
{
    public function sendMessage(
        int|string $chatId,
        string $text,
        ?string $parseMode = null,
        ?bool $disableNotification = null,
        ?bool $protectContent = null,
        ?int $replyToMessageId = null,
    ): Message {
        $params = [
            'chat_id' => $chatId,
            'text' => $text,
        ];

        if ($parseMode !== null) {
            $params['parse_mode'] = $parseMode;
        }
        if ($disableNotification !== null) {
            $params['disable_notification'] = $disableNotification;
        }
        if ($protectContent !== null) {
            $params['protect_content'] = $protectContent;
        }
        if ($replyToMessageId !== null) {
            $params['reply_parameters'] = ['message_id' => $replyToMessageId];
        }

        $result = $this->api->call('sendMessage', $params);

        return Message::fromArray($result);
    }
}
