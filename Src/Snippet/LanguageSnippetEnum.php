<?php

namespace Makhnanov\Telegram81\Snippet;

use Makhnanov\PhpEnum\UpgradedEnumInterface;
use Makhnanov\PhpEnum\EnumExtension;

enum LanguageSnippetEnum: string implements UpgradedEnumInterface
{
    use UpgradeEnum;

    case RUSSIAN = 'Русский 🇷🇺';
    case ENGLISH = 'English 🇺🇸';
}
