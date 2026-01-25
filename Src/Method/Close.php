<?php

declare(strict_types=1);

namespace Makhnanov\TelegramBot\Method;

trait Close
{
    public function close(): bool
    {
        $params = [];

        return $this->api->call('close', $params);
    }
}
