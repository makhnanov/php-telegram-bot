<?php
declare(strict_types=1);

namespace Makhnanov\Telegram81\Api\Enumeration;

use Makhnanov\PhpEnum81\EnumUpgrade;

enum HttpMethod
{
    use EnumUpgrade;

    case Get;
    case Post;
}
