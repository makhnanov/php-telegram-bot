<?php

declare(strict_types=1);

namespace Makhnanov\TelegramBot\Method;

use Makhnanov\TelegramBot\Type\ChatInviteLink;

trait RevokeChatInviteLink
{
    public function revokeChatInviteLink(
        int|string $chatId,
        string $inviteLink,
    ): ChatInviteLink
    {
        $params = [];

        $params['chat_id'] = $chatId;
        $params['invite_link'] = $inviteLink;

        $result = $this->api->call('revokeChatInviteLink', $params);

        return ChatInviteLink::fromArray($result);
    }
}
