<?php

declare(strict_types=1);

namespace Makhnanov\TelegramBot\Method;

use Makhnanov\TelegramBot\Type\ChatInviteLink;

trait CreateChatSubscriptionInviteLink
{
    public function createChatSubscriptionInviteLink(
        int|string $chatId,
        int $subscriptionPeriod,
        int $subscriptionPrice,
        ?string $name = null,
    ): ChatInviteLink
    {
        $params = [];

        $params['chat_id'] = $chatId;
        if ($name !== null) {
            $params['name'] = $name;
        }
        $params['subscription_period'] = $subscriptionPeriod;
        $params['subscription_price'] = $subscriptionPrice;

        $result = $this->api->call('createChatSubscriptionInviteLink', $params);

        return ChatInviteLink::fromArray($result);
    }
}
