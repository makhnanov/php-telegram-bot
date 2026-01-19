<?php
declare(strict_types=1);

namespace Makhnanov\TelegramBot\Api\Enumeration;

use Makhnanov\PhpEnum\UpgradedEnumInterface;
use Makhnanov\PhpEnum\EnumExtension;

enum HttpMethod implements UpgradedEnumInterface
{
    use EnumExtension;

    case Get;
    case Post;
}
