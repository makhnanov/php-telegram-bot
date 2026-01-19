<?php

namespace Makhnanov\TelegramBot\Api\Enumeration;

use Makhnanov\PhpEnum\UpgradedEnumInterface;
use Makhnanov\PhpEnum\EnumExtension;

enum Offset implements UpgradedEnumInterface
{
    use EnumExtension;

    case Auto;
}
