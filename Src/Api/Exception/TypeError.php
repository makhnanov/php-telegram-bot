<?php

namespace Makhnanov\TelegramBot\Api\Exception;

use JetBrains\PhpStorm\Internal\LanguageLevelTypeAware;
use Throwable;

class TypeError extends \TypeError
{
    // Fatal error: Uncaught TypeError: a(): Argument #1 ($f) must be of type int,
    // string given, called in /var/www/html/start.php on line 65 and defined in /var/www/html/start.php:61
    public function __construct(string $message = "", int $code = 0, ?Throwable $previous = null)
    {
        parent::__construct($message, $code, $previous);
    }
}
