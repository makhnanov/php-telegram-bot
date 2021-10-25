<?php
declare(strict_types=1);

namespace Makhnanov\Telegram81\Api\Enumeration;

use Makhnanov\PhpEnum81\EnumUpgrade;

enum ParseMode
{
    use EnumUpgrade;

    case HTML;
    case Markdown;
    case MarkdownV2;
}
