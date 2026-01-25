<?php

declare(strict_types=1);

namespace Makhnanov\TelegramBot\Method;

trait SetMessageReaction
{
    public function setMessageReaction(
        int|string $chatId,
        int $messageId,
        ?array $reaction = null,
        ?bool $isBig = null,
    ): bool
    {
        $params = [];

        $params['chat_id'] = $chatId;
        $params['message_id'] = $messageId;
        if ($reaction !== null) {
            $params['reaction'] = $reaction;
        }
        if ($isBig !== null) {
            $params['is_big'] = $isBig;
        }

        return $this->api->call('setMessageReaction', $params);
    }
}
