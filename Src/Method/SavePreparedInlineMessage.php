<?php

declare(strict_types=1);

namespace Makhnanov\TelegramBot\Method;

use Makhnanov\TelegramBot\Type\PreparedInlineMessage;

trait SavePreparedInlineMessage
{
    public function savePreparedInlineMessage(
        int $userId,
        InlineQueryResult $result,
        ?bool $allowUserChats = null,
        ?bool $allowBotChats = null,
        ?bool $allowGroupChats = null,
        ?bool $allowChannelChats = null,
    ): PreparedInlineMessage
    {
        $params = [];

        $params['user_id'] = $userId;
        $params['result'] = $result;
        if ($allowUserChats !== null) {
            $params['allow_user_chats'] = $allowUserChats;
        }
        if ($allowBotChats !== null) {
            $params['allow_bot_chats'] = $allowBotChats;
        }
        if ($allowGroupChats !== null) {
            $params['allow_group_chats'] = $allowGroupChats;
        }
        if ($allowChannelChats !== null) {
            $params['allow_channel_chats'] = $allowChannelChats;
        }

        $result = $this->api->call('savePreparedInlineMessage', $params);

        return PreparedInlineMessage::fromArray($result);
    }
}
