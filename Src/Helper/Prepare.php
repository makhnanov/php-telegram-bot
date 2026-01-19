<?php

namespace Makhnanov\TelegramBot\Helper;

use GuzzleHttp\Utils;
use Makhnanov\TelegramBot\Api\Type\Keyboard\ReplyMarkup;

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
