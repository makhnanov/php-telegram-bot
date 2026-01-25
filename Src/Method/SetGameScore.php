<?php

declare(strict_types=1);

namespace Makhnanov\TelegramBot\Method;

use Makhnanov\TelegramBot\Type\error;

trait SetGameScore
{
    public function setGameScore(
        int $userId,
        int $score,
        ?bool $force = null,
        ?bool $disableEditMessage = null,
        ?int $chatId = null,
        ?int $messageId = null,
        ?string $inlineMessageId = null,
    ): error
    {
        $params = [];

        $params['user_id'] = $userId;
        $params['score'] = $score;
        if ($force !== null) {
            $params['force'] = $force;
        }
        if ($disableEditMessage !== null) {
            $params['disable_edit_message'] = $disableEditMessage;
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

        $result = $this->api->call('setGameScore', $params);

        return error::fromArray($result);
    }
}
