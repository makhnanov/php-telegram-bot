<?php

namespace Makhnanov\Telegram81\Helper;

use GuzzleHttp\Utils;
use Makhnanov\Telegram81\Api\Type\ReplyMarkup;

class Prepare
{
    public static function replyMarkup(array $reply_markup): string
    {
        if ($reply_markup) {
            if (is_array($reply_markup)) {
                return Utils::jsonEncode($reply_markup);
            } /** @noinspection PhpStatementHasEmptyBodyInspection */ elseif ($reply_markup instanceof ReplyMarkup) {
                # todo
            }
        }
        return '';
    }
}
