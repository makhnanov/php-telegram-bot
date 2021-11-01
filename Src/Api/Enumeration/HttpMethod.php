<?php
declare(strict_types=1);

namespace Makhnanov\Telegram81\Api\Enumeration;

use Makhnanov\PhpEnum81\UpgradedEnumInterface;
use Makhnanov\PhpEnum81\UpgradeEnum;

enum HttpMethod implements UpgradedEnumInterface
{
    use UpgradeEnum;

    case Get;
    case Post;
}
