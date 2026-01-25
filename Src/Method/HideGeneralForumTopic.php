<?php

declare(strict_types=1);

namespace Makhnanov\TelegramBot\Method;

trait HideGeneralForumTopic
{
    public function hideGeneralForumTopic(
        int|string $chatId,
    ): bool
    {
        $params = [];

        $params['chat_id'] = $chatId;

        return $this->api->call('hideGeneralForumTopic', $params);
    }
}
