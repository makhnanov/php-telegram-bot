<?php

declare(strict_types=1);

namespace Makhnanov\TelegramBot\Method;

trait RemoveUserVerification
{
    public function removeUserVerification(
        int $userId,
    ): bool
    {
        $params = [];

        $params['user_id'] = $userId;

        return $this->api->call('removeUserVerification', $params);
    }
}
