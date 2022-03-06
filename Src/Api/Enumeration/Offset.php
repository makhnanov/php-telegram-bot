<?php

namespace Makhnanov\Telegram81\Api\Enumeration;

use Makhnanov\PhpEnum\UpgradedEnumInterface;
use Makhnanov\PhpEnum\EnumExtension;

enum Offset implements UpgradedEnumInterface
{
    use UpgradeEnum;

    case Auto;
}
