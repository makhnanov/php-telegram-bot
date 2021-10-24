<?php

namespace Makhnanov\Telegram81\Api\Type\keyboard\inline;

use JetBrains\PhpStorm\ArrayShape;
use Makhnanov\Telegram81\Api\Type\SelfFilling;

class InlineKeyboardMarkup extends SelfFilling
{
    #[ArrayShape(['inline_keyboard' => "array[]"])]
    public static function new(array $rows): array
    {
        return [
            'inline_keyboard' => [
                $rows
            ]
        ];
    }
}
