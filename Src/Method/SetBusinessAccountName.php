<?php

declare(strict_types=1);

namespace Makhnanov\TelegramBot\Method;

trait SetBusinessAccountName
{
    public function setBusinessAccountName(
        string $businessConnectionId,
        string $firstName,
        ?string $lastName = null,
    ): bool
    {
        $params = [];

        $params['business_connection_id'] = $businessConnectionId;
        $params['first_name'] = $firstName;
        if ($lastName !== null) {
            $params['last_name'] = $lastName;
        }

        return $this->api->call('setBusinessAccountName', $params);
    }
}
