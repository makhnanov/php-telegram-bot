<?php

declare(strict_types=1);

namespace Makhnanov\TelegramBot\Method;

use Makhnanov\TelegramBot\Type\StarAmount;

trait GetBusinessAccountStarBalance
{
    public function getBusinessAccountStarBalance(
        string $businessConnectionId,
    ): StarAmount
    {
        $params = [];

        $params['business_connection_id'] = $businessConnectionId;

        $result = $this->api->call('getBusinessAccountStarBalance', $params);

        return StarAmount::fromArray($result);
    }
}
