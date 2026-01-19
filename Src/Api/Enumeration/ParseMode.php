<?php
declare(strict_types=1);

namespace Makhnanov\TelegramBot\Api\Enumeration;

use Makhnanov\PhpEnum\UpgradedEnumInterface;
use Makhnanov\PhpEnum\EnumExtension;

enum ParseMode implements UpgradedEnumInterface
{
    use EnumExtension;

    case HTML;
    case Markdown;
    case MarkdownV2;
}
