<?php

declare(strict_types=1);

use Makhnanov\TelegramBot\Bot;

$__bot = null;

function bot(?string $token = null): Bot
{
    global $__bot;

    if (
        $token !== null
        || (defined('TELEGRAM_BOT_TOKEN') && $token = TELEGRAM_BOT_TOKEN)
        || ($token = getenv('TELEGRAM_BOT_TOKEN'))
    ) {
        $__bot = new Bot($token);
    }

    if ($__bot === null) {
        throw new RuntimeException('Bot not initialized. Set token first.');
    }

    return $__bot;
}
