<?php

namespace Makhnanov\Telegram81\Helper;

use GuzzleHttp\Utils;
use Makhnanov\Telegram81\Api\Type\Keyboard\ReplyMarkup;

class Prepare
{
    public static function replyMarkup(null|array|ReplyMarkup $reply_markup): ?string
    {
        if ($reply_markup) {
            if (is_array($reply_markup)) {
                return Utils::jsonEncode($reply_markup);
            } /** @noinspection PhpStatementHasEmptyBodyInspection */ elseif ($reply_markup instanceof ReplyMarkup) {
                # todo
            }
        }
        return null;
    }
}
