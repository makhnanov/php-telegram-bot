<?php

namespace Makhnanov\Telegram81\Api\Enumeration;

use Makhnanov\PhpEnum81\UpgradedEnumInterface;
use Makhnanov\PhpEnum81\UpgradeEnum;

enum Offset implements UpgradedEnumInterface
{
    use UpgradeEnum;

    case Auto;
}
