<?php

declare(strict_types=1);

namespace Makhnanov\TelegramBot\Method;

trait DeleteBusinessMessages
{
    public function deleteBusinessMessages(
        string $businessConnectionId,
        array $messageIds,
    ): bool
    {
        $params = [];

        $params['business_connection_id'] = $businessConnectionId;
        $params['message_ids'] = $messageIds;

        return $this->api->call('deleteBusinessMessages', $params);
    }
}
