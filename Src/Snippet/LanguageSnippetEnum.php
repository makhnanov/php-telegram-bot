<?php

namespace Makhnanov\Telegram81\Snippet;

use Makhnanov\PhpEnum81\UpgradedEnumInterface;
use Makhnanov\PhpEnum81\UpgradeEnum;

enum LanguageSnippetEnum: string implements UpgradedEnumInterface
{
    use UpgradeEnum;

    case RUSSIAN = 'Русский 🇷🇺';
    case ENGLISH = 'English 🇺🇸';
}
