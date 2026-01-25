<?php

declare(strict_types=1);

namespace Makhnanov\TelegramBot\Method;

trait VerifyUser
{
    public function verifyUser(
        int $userId,
        ?string $customDescription = null,
    ): bool
    {
        $params = [];

        $params['user_id'] = $userId;
        if ($customDescription !== null) {
            $params['custom_description'] = $customDescription;
        }

        return $this->api->call('verifyUser', $params);
    }
}
