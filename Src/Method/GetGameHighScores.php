<?php

declare(strict_types=1);

namespace Makhnanov\TelegramBot\Method;

trait GetGameHighScores
{
    public function getGameHighScores(
        int $userId,
        ?int $chatId = null,
        ?int $messageId = null,
        ?string $inlineMessageId = null,
    ): array
    {
        $params = [];

        $params['user_id'] = $userId;
        if ($chatId !== null) {
            $params['chat_id'] = $chatId;
        }
        if ($messageId !== null) {
            $params['message_id'] = $messageId;
        }
        if ($inlineMessageId !== null) {
            $params['inline_message_id'] = $inlineMessageId;
        }

        return $this->api->call('getGameHighScores', $params);
    }
}
