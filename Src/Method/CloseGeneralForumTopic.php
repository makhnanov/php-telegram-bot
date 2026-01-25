<?php

declare(strict_types=1);

namespace Makhnanov\TelegramBot\Method;

trait CloseGeneralForumTopic
{
    public function closeGeneralForumTopic(
        int|string $chatId,
    ): bool
    {
        $params = [];

        $params['chat_id'] = $chatId;

        return $this->api->call('closeGeneralForumTopic', $params);
    }
}
