<?php

declare(strict_types=1);

require __DIR__ . '/../vendor/autoload.php';

use Makhnanov\TelegramBot\Bot;

$bot = new Bot('YOUR_BOT_TOKEN');

echo "Bot started. Listening for updates...\n";

// Бесконечный цикл через генератор
foreach ($bot->poll(timeout: 30) as $update) {

    // Текстовое сообщение
    if ($message = $update->message) {
        $chatId = $message->chat->id;
        $text = $message->text;

        echo "Message from {$message->from?->firstName}: {$text}\n";

        // Echo bot - отвечает тем же текстом
        if ($text) {
            $bot->sendMessage(
                chatId: $chatId,
                text: "You said: {$text}",
            );
        }

        // Команда /start
        if ($text === '/start') {
            $bot->sendMessage(
                chatId: $chatId,
                text: "Hello, {$message->from?->firstName}!",
            );
        }
    }

    // Callback от inline кнопки
    if ($callback = $update->callbackQuery) {
        echo "Callback: {$callback->data}\n";
    }
}