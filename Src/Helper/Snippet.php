<?php

namespace Makhnanov\Telegram81\Helper;

use JetBrains\PhpStorm\ArrayShape;
use Makhnanov\Telegram81\Helper\Smile\JoystickSmile as J;

use function Makhnanov\Telegram81\callbackButton;

class Snippet
{
    #[ArrayShape(['inline_keyboard' => "array"])]
    public static function inlneJoystick(array $prepend = [], array $append = [])
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
}
