<?php

declare(strict_types=1);

namespace Makhnanov\TelegramBot\Method;

trait UnpinAllGeneralForumTopicMessages
{
    public function unpinAllGeneralForumTopicMessages(
        int|string $chatId,
    ): bool
    {
        $params = [];

        $params['chat_id'] = $chatId;

        return $this->api->call('unpinAllGeneralForumTopicMessages', $params);
    }
}
