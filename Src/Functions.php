<?php

declare(strict_types=1);

use Makhnanov\TelegramBot\Bot;

$bot = null;

function bot(): Bot
{
    global $bot;
    if (is_null($bot)) {
        $bot = new Bot();
    }
    return $bot;
}
