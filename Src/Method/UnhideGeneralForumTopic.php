<?php

declare(strict_types=1);

namespace Makhnanov\TelegramBot\Method;

trait UnhideGeneralForumTopic
{
    public function unhideGeneralForumTopic(
        int|string $chatId,
    ): bool
    {
        $params = [];

        $params['chat_id'] = $chatId;

        return $this->api->call('unhideGeneralForumTopic', $params);
    }
}
