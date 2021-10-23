<?php
declare(strict_types=1);

namespace Makhnanov\Telegram81\Api\Enumeration;

enum ParseMode
{
    case HTML;
    case Markdown;
    case MarkdownV2;
}
