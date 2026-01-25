<?php

declare(strict_types=1);

namespace Makhnanov\TelegramBot\Method;

trait EditGeneralForumTopic
{
    public function editGeneralForumTopic(
        int|string $chatId,
        string $name,
    ): bool
    {
        $params = [];

        $params['chat_id'] = $chatId;
        $params['name'] = $name;

        return $this->api->call('editGeneralForumTopic', $params);
    }
}
