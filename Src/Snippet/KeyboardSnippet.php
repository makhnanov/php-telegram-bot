<?php

namespace Makhnanov\Telegram81\Snippet;

use JetBrains\PhpStorm\ArrayShape;
use Makhnanov\Telegram81\Emoji\Enumeration\JoystickEnum as J;

use function Makhnanov\Telegram81\callbackButton;

class KeyboardSnippet
{
    #[ArrayShape(['inline_keyboard' => "array"])]
    public static function inlineJoystick(array $prepend = [], array $append = []): array
    {
        return [
            'inline_keyboard' => [
                ...$prepend,
                [callbackButton(J::UP_LEFT), callbackButton(J::UP), callbackButton(J::UP_RIGHT)],
                [callbackButton(J::LEFT), callbackButton(J::CENTER), callbackButton(J::RIGHT)],
                [callbackButton(J::DOWN_LEFT), callbackButton(J::DOWN), callbackButton(J::DOWN_RIGHT)],
                ...$append
            ]
        ];
    }

    #[ArrayShape(['inline_keyboard' => "array"])]
    public static function russianEnglish(array $prepend = [], array $append = []): array
    {
        return [
            'inline_keyboard' => [
                ...$prepend,
                [callbackButton(LanguageSnippetEnum::RUSSIAN), callbackButton(LanguageSnippetEnum::ENGLISH)],
                ...$append
            ]
        ];
    }
}
