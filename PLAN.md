# PHP Telegram Bot Library - План

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

## Приоритет реализации

### Фаза 1 - MVP
1. `Bot` - конструктор с токеном
2. `Api` - HTTP запросы через curl
3. `sendMessage` - отправка текста
4. `Message`, `Chat`, `User` - базовые типы

### Фаза 2 - Получение обновлений
5. `getUpdates` - long polling
6. `Update` - тип обновления
7. Простой цикл обработки

### Фаза 3 - Медиа
8. `sendPhoto`
9. `sendDocument`
10. `sendVideo`

### Фаза 4 - Клавиатуры
11. `InlineKeyboardMarkup`
12. `ReplyKeyboardMarkup`
13. `CallbackQuery`

### Фаза 5 - Остальное
14. Все остальные методы по мере необходимости

## Что НЕ делаем

- Никаких абстрактных фабрик и DI-контейнеров
- Никаких интерфейсов "на будущее"
- Никаких сторонних зависимостей (только curl)
- Никаких ORM-подобных паттернов
- Никакого кеширования и state management

## Пример итогового использования

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