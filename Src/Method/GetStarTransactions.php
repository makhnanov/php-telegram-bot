<?php

declare(strict_types=1);

namespace Makhnanov\TelegramBot\Method;

use Makhnanov\TelegramBot\Type\StarTransactions;

trait GetStarTransactions
{
    public function getStarTransactions(
        ?int $offset = null,
        ?int $limit = null,
    ): StarTransactions
    {
        $params = [];

        if ($offset !== null) {
            $params['offset'] = $offset;
        }
        if ($limit !== null) {
            $params['limit'] = $limit;
        }

        $result = $this->api->call('getStarTransactions', $params);

        return StarTransactions::fromArray($result);
    }
}
