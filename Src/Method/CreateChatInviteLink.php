<?php

declare(strict_types=1);

namespace Makhnanov\TelegramBot\Method;

use Makhnanov\TelegramBot\Type\ChatInviteLink;

trait CreateChatInviteLink
{
    public function createChatInviteLink(
        int|string $chatId,
        ?string $name = null,
        ?int $expireDate = null,
        ?int $memberLimit = null,
        ?bool $createsJoinRequest = null,
    ): ChatInviteLink
    {
        $params = [];

        $params['chat_id'] = $chatId;
        if ($name !== null) {
            $params['name'] = $name;
        }
        if ($expireDate !== null) {
            $params['expire_date'] = $expireDate;
        }
        if ($memberLimit !== null) {
            $params['member_limit'] = $memberLimit;
        }
        if ($createsJoinRequest !== null) {
            $params['creates_join_request'] = $createsJoinRequest;
        }

        $result = $this->api->call('createChatInviteLink', $params);

        return ChatInviteLink::fromArray($result);
    }
}
