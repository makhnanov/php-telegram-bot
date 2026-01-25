<?php

declare(strict_types=1);

namespace Makhnanov\TelegramBot\Method;

use Makhnanov\TelegramBot\Type\ChatFullInfo;

trait GetChat
{
    public function getChat(
        int|string $chatId,
    ): ChatFullInfo
    {
        $params = [];

        $params['chat_id'] = $chatId;

        $result = $this->api->call('getChat', $params);

        return ChatFullInfo::fromArray($result);
    }
}
