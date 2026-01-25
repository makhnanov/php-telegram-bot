<?php

declare(strict_types=1);

namespace Makhnanov\TelegramBot\Method;

use Makhnanov\TelegramBot\Type\User;

trait GetMe
{
    public function getMe(): User
    {
        $params = [];

        $result = $this->api->call('getMe', $params);

        return User::fromArray($result);
    }
}
