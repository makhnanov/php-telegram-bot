<?php

namespace Makhnanov\Telegram81\Api\Enumeration;

use Makhnanov\PhpEnum81\UpgradedEnumInterface;
use Makhnanov\PhpEnum81\UpgradeEnum;

enum ChatType implements UpgradedEnumInterface
{
    use UpgradeEnum;

    case private;
    case group;
    case supergroup;
    case channel;
}
