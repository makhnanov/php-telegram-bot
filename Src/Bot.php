<?php

declare(strict_types=1);

namespace Makhnanov\TelegramBot;

use Makhnanov\TelegramBot\Method\GetUpdates;
use Makhnanov\TelegramBot\Method\SendMessage;

class Bot
{
    use GetUpdates;
    use SendMessage;

    public readonly Api $api;

    public function __construct(
        string $token,
    ) {
        $this->api = new Api($token);
    }
}
