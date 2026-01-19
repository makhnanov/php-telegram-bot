<?php
declare(strict_types=1);

namespace Makhnanov\TelegramBot\Api\Enumeration;

use Makhnanov\PhpEnum\UpgradedEnumInterface;
use Makhnanov\PhpEnum\EnumExtension;

enum AllowedUpdates implements UpgradedEnumInterface
{
    use EnumExtension;

    case message;
    case edited_message;
    case channel_post;
    case edited_channel_post;
    case inline_query;
    case chosen_inline_result;
    case callback_query;
    case shipping_query;
    case pre_checkout_query;
    case poll;
    case poll_answer;
    case my_chat_member;
    case chat_member;
}
