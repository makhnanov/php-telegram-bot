[![PHP Version](https://img.shields.io/badge/php-8.5-blue.svg)](https://www.php.net/releases/8.5/en.php)
![stability](https://img.shields.io/badge/stability-unstable-red.svg)
![packagist](https://img.shields.io/badge/packagist-yes-darkgreen.svg)
![dependencies](https://img.shields.io/badge/dependencies-no-darkgreen.svg)

# PHP Telegram Vibe Clauded Bot Library

## Installation

```shell
composer require makhnanov/php-telegram-bot
```

## Long Pooling Example

```php
<?php

require 'vendor/autoload.php';

use Makhnanov\TelegramBot\Bot;

$bot = new Bot($_ENV['TELEGRAM_BOT_TOKEN']);

// Простая отправка
$bot->sendMessage(chatId: 123456789, text: 'Hello, World!');

// С форматированием
$bot->sendMessage(
    chatId: 123456789,
    text: '<b>Bold</b> and <i>italic</i>',
    parseMode: 'HTML',
);

// Polling loop
foreach ($bot->getUpdates() as $update) {
    if ($update->message?->text === '/start') {
        $bot->sendMessage(
            chatId: $update->message->chat->id,
            text: 'Welcome!',
        );
    }
}
```

## Философия

- **Минимализм**: только необходимое, никакого bloat
- **Лаконичность**: код пользователя должен быть коротким
- **Читаемость**: исходники библиотеки понятны без документации
- **PHP 8.5**: используем все современные возможности языка

## Структура

```
Src/
├── Bot.php              # Главный класс, точка входа
├── Functions.php        # Глобальный хелпер bot()
├── Api.php              # HTTP-клиент для запросов к API
├── Method/              # Методы API (трейты для Bot)
│   ├── SendMessage.php
│   ├── SendPhoto.php
│   ├── GetUpdates.php
│   └── ...
└── Type/                # Типы данных (DTO)
    ├── Message.php
    ├── Update.php
    ├── Chat.php
    ├── User.php
    └── ...
```

## Принципы дизайна

### 1. Один класс Bot - одна точка входа

```php
$bot = new Bot('TOKEN');
$bot->sendMessage(chatId: 123, text: 'Hello');
```

### 2. Named arguments везде

```php
// Вместо массивов параметров - именованные аргументы
$bot->sendMessage(
    chatId: $chatId,
    text: 'Hello',
    parseMode: 'HTML',
    disableNotification: true,
);
```

### 3. Глобальный хелпер для скриптов

```php
bot()->sendMessage(chatId: 123, text: 'Quick message');
```

### 4. Типы - простые readonly классы

```php
readonly class Message {
    public function __construct(
        public int $messageId,
        public ?User $from,
        public Chat $chat,
        public int $date,
        public ?string $text,
        // ...
    ) {}
}
```

### 5. Методы API - трейты

Каждый метод в отдельном трейте, Bot использует их:

```php
class Bot {
    use SendMessageTrait;
    use SendPhotoTrait;
    use GetUpdatesTrait;
    // ...
}
```

### 6. Цепочки для удобства

```php
bot()
    ->sendMessage(chatId: 123, text: 'First')
    ->sendMessage(chatId: 123, text: 'Second');
```

### Антипаттерны

- использование глобального состояния приложения (переменные, функции, константы)
- синтаксический сахар (всякие хелперы помогающие писать меньше)
