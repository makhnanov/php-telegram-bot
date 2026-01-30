[![PHP Version](https://img.shields.io/badge/php-8.5-blue.svg)](https://www.php.net/releases/8.5/en.php)
![stability](https://img.shields.io/badge/stability-unstable-red.svg)
![packagist](https://img.shields.io/badge/packagist-yes-darkgreen.svg)
![dependencies](https://img.shields.io/badge/dependencies-no-darkgreen.svg)
![vibe](https://img.shields.io/badge/vibe-clauded-da6a46)

# PHP Telegram Bot Library

## Installation

```shell
composer require makhnanov/php-telegram-bot
```

## Long Polling Example

```php
<?php

# require 'vendor/autoload.php';

use Makhnanov\TelegramBot\Bot;

$bot = new Bot('ENTER-BOT-TOKEN-HERE');
# $secondBot = new Bot('BOT_TOKEN'); # For another bot

# $bot = bot(); # Automatically gets TELEGRAM_BOT_TOKEN from env and make single global instance

# $chatId = 'ENTER_CHAT_ID_HERE_FOR_GET_FIRST_MESSAGES';

# $bot->sendMessage(chatId: $chatId, text: 'Hello, World!');
# $bot->sendMessage(
#     chatId: $chatId,
#     text: '<b>Bold</b> and <i>italic</i>',
#     parseMode: 'HTML',
# );

# Simple Echo Long Polling
foreach ($bot->poll() as $update) {
    if ($update->message?->text === '/start') {
        $bot->sendMessage(
            chatId: $update->message->chat->id,
            text: 'Welcome!',
        );
    } elseif ($update->message?->text) {
        $bot->sendMessage(
            chatId: $update->message->chat->id,
            text: $update->message->text,
        );
    } else {
        $bot->sendMessage(
            chatId: $update->message->chat->id,
            text: 'Not simple message!',
        );
    }
}

# ToDo: think about catch exceptions & $allowedUpdates
```

## Philosophy

- **Minimalism**: only what's necessary, no bloat
- **Conciseness**: user code should be short
- **Readability**: library source code is understandable without documentation
- **PHP 8.5**: leverage all modern language features

## Structure

```
Src/
├── Bot.php              # Main class, entry point
├── Functions.php        # Global helper bot()
├── Api.php              # HTTP client for API requests
├── Method/              # API methods (traits for Bot)
│   ├── SendMessage.php
│   ├── SendPhoto.php
│   ├── GetUpdates.php
│   └── ...
└── Type/                # Data types (DTO)
    ├── Message.php
    ├── Update.php
    ├── Chat.php
    ├── User.php
    └── ...
```

## Design Principles

### 1. One Bot class - one entry point

```php
$bot = new Bot('TOKEN');
$bot->sendMessage(chatId: 123, text: 'Hello');
```

### 2. Named arguments everywhere

```php
// Named arguments instead of parameter arrays
$bot->sendMessage(
    chatId: $chatId,
    text: 'Hello',
    parseMode: 'HTML',
    disableNotification: true,
);
```

### 3. Global helper for scripts

```php
bot()->sendMessage(chatId: 123, text: 'Quick message');
```

### 4. Types are simple readonly classes

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

### 5. API methods as traits

Each method in a separate trait, Bot uses them:

```php
class Bot {
    use SendMessageTrait;
    use SendPhotoTrait;
    use GetUpdatesTrait;
    // ...
}
```

### 6. Method chaining for convenience

```php
bot()
    ->sendMessage(chatId: 123, text: 'First')
    ->sendMessage(chatId: 123, text: 'Second');
```

### Anti-patterns

- Using global application state (variables, functions, constants)
- Syntactic sugar (various helpers that help write less code)
