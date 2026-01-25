<?php

declare(strict_types=1);

namespace Makhnanov\TelegramBot\Method;

trait ReopenGeneralForumTopic
{
    public function reopenGeneralForumTopic(
        int|string $chatId,
    ): bool
    {
        $params = [];

        $params['chat_id'] = $chatId;

        return $this->api->call('reopenGeneralForumTopic', $params);
    }
}
