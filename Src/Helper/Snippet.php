<?php

namespace Makhnanov\Telegram81\Helper;

use JetBrains\PhpStorm\ArrayShape;
use Makhnanov\Telegram81\Helper\Smile\SmileJoystick as J;

use function Makhnanov\Telegram81\callbackButton;

class Snippet
{
    #[ArrayShape(['inline_keyboard' => "array"])]
    public static function inlneJoystick(array $prepend = [], array $append = [])
    {
        return [
            'inline_keyboard' => [
                ...$prepend,
                [callbackButton(J::upLeft), callbackButton(J::up), callbackButton(J::upRight)],
                [callbackButton(J::left), callbackButton(J::center), callbackButton(J::right)],
                [callbackButton(J::downLeft), callbackButton(J::down), callbackButton(J::downRight)],
                ...$append
            ]
        ];
    }

//    public static function russianEnglishKeyboard()
//    {
//        return [callbackButton(LangEnum::RUSSIAN), callbackButton(LangEnum::ENGLISH)];
//    }
}
