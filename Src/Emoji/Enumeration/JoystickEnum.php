<?php

namespace Makhnanov\Telegram81\Emoji\Enumeration;

use Makhnanov\PhpEnum81\UpgradedEnumInterface;
use Makhnanov\PhpEnum81\UpgradeEnum;

enum JoystickEnum: string implements UpgradedEnumInterface
{
    use UpgradeEnum;

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
