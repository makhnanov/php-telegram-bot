<?php

declare(strict_types=1);

use Makhnanov\TelegramBot\Bot;
use Makhnanov\TelegramBot\Type\Update;

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

/**
 * Get Update object from webhook POST data.
 *
 * Reads raw POST input and parses JSON to create Update object.
 * Returns null if no valid update data is available.
 */
function getUpdate(): ?Update
{
    $input = file_get_contents('php://input');

    if (empty($input)) {
        return null;
    }

    $data = json_decode($input, true);

    if (!is_array($data) || !isset($data['update_id'])) {
        return null;
    }

    return Update::fromArray($data);
}
