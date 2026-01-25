<?php

declare(strict_types=1);

namespace Makhnanov\TelegramBot\Method;

trait SetBusinessAccountProfilePhoto
{
    public function setBusinessAccountProfilePhoto(
        string $businessConnectionId,
        InputProfilePhoto $photo,
        ?bool $isPublic = null,
    ): bool
    {
        $params = [];

        $params['business_connection_id'] = $businessConnectionId;
        $params['photo'] = $photo;
        if ($isPublic !== null) {
            $params['is_public'] = $isPublic;
        }

        return $this->api->call('setBusinessAccountProfilePhoto', $params);
    }
}
