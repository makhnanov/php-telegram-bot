<?php

declare(strict_types=1);

namespace Makhnanov\TelegramBot\Method;

trait RemoveBusinessAccountProfilePhoto
{
    public function removeBusinessAccountProfilePhoto(
        string $businessConnectionId,
        ?bool $isPublic = null,
    ): bool
    {
        $params = [];

        $params['business_connection_id'] = $businessConnectionId;
        if ($isPublic !== null) {
            $params['is_public'] = $isPublic;
        }

        return $this->api->call('removeBusinessAccountProfilePhoto', $params);
    }
}
