<?php

namespace Makhnanov\Telegram81\Api\Enumeration;

use Makhnanov\PhpEnum81\EnumUpgrade;

enum ChatType
{
    use EnumUpgrade;

    case private;
    case group;
    case supergroup;
    case channel;
}
