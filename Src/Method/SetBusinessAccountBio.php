<?php

declare(strict_types=1);

namespace Makhnanov\TelegramBot\Method;

trait SetBusinessAccountBio
{
    public function setBusinessAccountBio(
        string $businessConnectionId,
        ?string $bio = null,
    ): bool
    {
        $params = [];

        $params['business_connection_id'] = $businessConnectionId;
        if ($bio !== null) {
            $params['bio'] = $bio;
        }

        return $this->api->call('setBusinessAccountBio', $params);
    }
}
