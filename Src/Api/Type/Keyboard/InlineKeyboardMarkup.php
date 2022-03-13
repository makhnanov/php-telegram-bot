<?php

namespace Makhnanov\Telegram81\Api\Type\Keyboard;

use JetBrains\PhpStorm\ArrayShape;
use Makhnanov\Telegram81\Api\Type\SelfFilling;

class InlineKeyboardMarkup extends SelfFilling
{
    #[ArrayShape(['inline_keyboard' => "array[]"])]
    public static function new(array ...$row): array
    {
        return ['inline_keyboard' => func_get_args()];
    }
}
