<?php

declare(strict_types=1);

namespace Makhnanov\Telegram81\Helper;

use JetBrains\PhpStorm\ArrayShape;

class InlineKeyboard
{
    #[ArrayShape(['inline_keyboard' => [[['text' => '\string', 'url' => '\string']]]])]
    public static function oneUrlButton(string $title, string $url): array
    {
        return [
            'inline_keyboard' => [
                [
                    [
                        'text' => $title,
                        'url' => $url,
                    ],
                ],
            ],
        ];
    }
}
