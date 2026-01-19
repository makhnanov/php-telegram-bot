<?php

namespace Makhnanov\TelegramBot\Api\Enumeration;

use Makhnanov\PhpEnum\UpgradedEnumInterface;
use Makhnanov\PhpEnum\EnumExtension;

enum ChatType implements UpgradedEnumInterface
{
    use EnumExtension;

    case private;
    case group;
    case supergroup;
    case channel;
}
