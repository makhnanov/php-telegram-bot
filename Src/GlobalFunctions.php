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

$telegramPostUpdateData = [];

function getUpdate(): Update
{
    $input = file_get_contents('php://input');

    if (empty($input)) {
        throw new RuntimeException('Input is empty.');
    }

    $data = json_decode($input, true);

    if (!is_array($data) || !isset($data['update_id'])) {
        throw new RuntimeException("Invalid input data.");
    }

    global $telegramPostUpdateData;
    $telegramPostUpdateData = $data;

    return Update::fromArray($data);
}

function txt(?string $compare = null): string|bool
{
    $u = getUpdate();
    $text = $u->message?->text;
    if ($compare) {
        return $text === $compare;
    }
    return $text;
}

function text(?string $compare = null): string|bool
{
    return txt($compare);
}

function verifySecretToken(string $secretToken): void
{
    if (
        !isset($_SERVER['HTTP_X_TELEGRAM_BOT_API_SECRET_TOKEN'])
        || !$_SERVER['HTTP_X_TELEGRAM_BOT_API_SECRET_TOKEN']
        || $_SERVER['HTTP_X_TELEGRAM_BOT_API_SECRET_TOKEN'] !== $secretToken
    ) {
        throw new RuntimeException('Invalid secret token.');
    }
}
