<?php

namespace Makhnanov\Telegram81\Snippet;

use Makhnanov\PhpEnum81\EnumUpgrade;

enum LanguageSnippetEnum: string
{
    use EnumUpgrade;

    case RUSSIAN = 'Русский 🇷🇺';
    case ENGLISH = 'English 🇺🇸';
}
