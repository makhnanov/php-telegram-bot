<?php
declare(strict_types=1);

namespace Makhnanov\Telegram81\Api\Enumeration;

use Makhnanov\PhpEnum81\UpgradedEnumInterface;
use Makhnanov\PhpEnum81\UpgradeEnum;

enum ParseMode implements UpgradedEnumInterface
{
    use UpgradeEnum;

    case HTML;
    case Markdown;
    case MarkdownV2;
}
