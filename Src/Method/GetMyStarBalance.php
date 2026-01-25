<?php

declare(strict_types=1);

namespace Makhnanov\TelegramBot\Method;

use Makhnanov\TelegramBot\Type\StarAmount;

trait GetMyStarBalance
{
    public function getMyStarBalance(): StarAmount
    {
        $params = [];

        $result = $this->api->call('getMyStarBalance', $params);

        return StarAmount::fromArray($result);
    }
}
