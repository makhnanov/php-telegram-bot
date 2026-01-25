<?php

declare(strict_types=1);

namespace Makhnanov\TelegramBot\Method;

trait LogOut
{
    public function logOut(): bool
    {
        $params = [];

        return $this->api->call('logOut', $params);
    }
}
