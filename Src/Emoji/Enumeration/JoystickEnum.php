<?php

namespace Makhnanov\TelegramBot\Emoji\Enumeration;

use Makhnanov\PhpEnum\UpgradedEnumInterface;
use Makhnanov\PhpEnum\EnumExtension;

enum JoystickEnum: string implements UpgradedEnumInterface
{
    use EnumExtension;

    case UP_LEFT = '↖️';
    case UP = '⬆️';
    case UP_RIGHT = '↗️';
    case LEFT = '⬅️';
    case CENTER = '⏺';
    case RIGHT = '➡️';
    case DOWN_LEFT = '↙️';
    case DOWN = '⬇️';
    case DOWN_RIGHT = '↘️';
}
