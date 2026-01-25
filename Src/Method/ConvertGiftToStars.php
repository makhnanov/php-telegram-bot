<?php

declare(strict_types=1);

namespace Makhnanov\TelegramBot\Method;

trait ConvertGiftToStars
{
    public function convertGiftToStars(
        string $businessConnectionId,
        string $ownedGiftId,
    ): bool
    {
        $params = [];

        $params['business_connection_id'] = $businessConnectionId;
        $params['owned_gift_id'] = $ownedGiftId;

        return $this->api->call('convertGiftToStars', $params);
    }
}
