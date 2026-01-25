<?php

declare(strict_types=1);

namespace Makhnanov\TelegramBot\Method;

use Makhnanov\TelegramBot\Type\ChatInviteLink;

trait EditChatSubscriptionInviteLink
{
    public function editChatSubscriptionInviteLink(
        int|string $chatId,
        string $inviteLink,
        ?string $name = null,
    ): ChatInviteLink
    {
        $params = [];

        $params['chat_id'] = $chatId;
        $params['invite_link'] = $inviteLink;
        if ($name !== null) {
            $params['name'] = $name;
        }

        $result = $this->api->call('editChatSubscriptionInviteLink', $params);

        return ChatInviteLink::fromArray($result);
    }
}
