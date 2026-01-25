<?php

declare(strict_types=1);

namespace Makhnanov\TelegramBot\Method;

use Makhnanov\TelegramBot\Type\BusinessConnection;

trait GetBusinessConnection
{
    public function getBusinessConnection(
        string $businessConnectionId,
    ): BusinessConnection
    {
        $params = [];

        $params['business_connection_id'] = $businessConnectionId;

        $result = $this->api->call('getBusinessConnection', $params);

        return BusinessConnection::fromArray($result);
    }
}
