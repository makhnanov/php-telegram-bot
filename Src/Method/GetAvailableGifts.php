<?php

declare(strict_types=1);

namespace Makhnanov\TelegramBot\Method;

use Makhnanov\TelegramBot\Type\Gifts;

trait GetAvailableGifts
{
    public function getAvailableGifts(): Gifts
    {
        $params = [];

        $result = $this->api->call('getAvailableGifts', $params);

        return Gifts::fromArray($result);
    }
}
