<?php

namespace Makhnanov\Telegram81\Helper\Smile;

use Makhnanov\PhpEnum81\EnumUpgrade;

enum SmileJoystick: string
{
    use EnumUpgrade;

    case upLeft = '↖️';
    case up = '⬆️';
    case upRight = '↗️';
    case left = '⬅️';
    case center = '⏺';
    case right = '➡️';
    case downLeft = '↙️';
    case down = '⬇️';
    case downRight = '↘️';
}
