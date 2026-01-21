<?php

declare(strict_types=1);

require __DIR__ . '/../vendor/autoload.php';

use Makhnanov\TelegramBot\Bot;

// Способ 1: Через класс напрямую
$bot = new Bot('YOUR_BOT_TOKEN');

$message = $bot->sendMessage(
    chatId: 123456789,
    text: 'Hello, World!',
);

echo "Sent message #{$message->messageId}\n";


// Способ 2: С форматированием
$bot->sendMessage(
    chatId: 123456789,
    text: '<b>Bold</b> and <i>italic</i>',
    parseMode: 'HTML',
);


// Способ 3: Через глобальный хелпер
bot('YOUR_BOT_TOKEN');

bot()->sendMessage(
    chatId: 123456789,
    text: 'Via helper function',
);


// Способ 4: Ответ на сообщение
bot()->sendMessage(
    chatId: 123456789,
    text: 'This is a reply',
    replyToMessageId: 42,
);