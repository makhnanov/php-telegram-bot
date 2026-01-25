<?php

declare(strict_types=1);

namespace Makhnanov\TelegramBot\Method;

trait SetBusinessAccountUsername
{
    public function setBusinessAccountUsername(
        string $businessConnectionId,
        ?string $username = null,
    ): bool
    {
        $params = [];

        $params['business_connection_id'] = $businessConnectionId;
        if ($username !== null) {
            $params['username'] = $username;
        }

        return $this->api->call('setBusinessAccountUsername', $params);
    }
}
