<?php
declare(strict_types=1);

namespace Makhnanov\Telegram81\Api\Enumeration;

use Makhnanov\PhpEnum\UpgradedEnumInterface;
use Makhnanov\PhpEnum\EnumExtension;

enum HttpMethod implements UpgradedEnumInterface
{
    use UpgradeEnum;

    case Get;
    case Post;
}
