<?php

declare(strict_types=1);

namespace Makhnanov\TelegramBot\Method;

trait TransferBusinessAccountStars
{
    public function transferBusinessAccountStars(
        string $businessConnectionId,
        int $starCount,
    ): bool
    {
        $params = [];

        $params['business_connection_id'] = $businessConnectionId;
        $params['star_count'] = $starCount;

        return $this->api->call('transferBusinessAccountStars', $params);
    }
}
