<?php

namespace Makhnanov\Telegram81\Helper\Smile;

use Makhnanov\PhpEnum81\EnumUpgrade;

enum SmileInfo: string
{
    use EnumUpgrade;

    case ABC = '🔤';
    case NEW = '🆕';
    case FREE = '🆓';
}
