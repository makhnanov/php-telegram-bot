<?php

namespace Makhnanov\Telegram81\Api\Method\Edit;

use Makhnanov\Telegram81\Api\Enumeration\ParseMode;
use Makhnanov\Telegram81\Api\Type\keyboard\inline\InlineKeyboardMarkup;
use Makhnanov\Telegram81\Api\Type\MessageEntityCollection;
use Makhnanov\Telegram81\Helper\ViaArray;

/**
 * @see EditMessageText
 */
trait EditMessageTextTrait
{
    /**
     * @url https://core.telegram.org/bots/api#editmessagetext
     *
     * Use this method to edit text and game messages. On success, if the edited message is not an inline message,
     * the edited Message is returned, otherwise True is returned.
     *
     * @param string $text New text of the message, 1-4096 characters after entities parsing
     *
     * @param ?int|string $chat_id @Optional. Required if inline_message_id is not specified. Unique identifier for
     *                             the target chat or username of the target channel (in the format @channelusername)
     *
     * @param ?int $message_id @Optional. Required if inline_message_id is not specified. Identifier of the message to edit
     *
     * @param ?string $inline_message_id @Optional. Required if chat_id and message_id are not specified.
     *                                   Identifier of the inline message
     *
     * @param ?ParseMode $parse_mode @Optional. Mode for parsing entities in the message text.
     *                               See formatting options for more details.
     *
     * @param ?MessageEntityCollection $entities @Optional. A JSON-serialized list of special entities that appear
     *                                           in message text, which can be specified instead of parse_mode
     *
     * @param ?Boolean $disable_web_page_preview @Optional. Disables link previews for links in this message
     *
     * @param ?InlineKeyboardMarkup $reply_markup @Optional. A JSON-serialized object for an inline keyboard.
     *
     * @param null|array|ViaArray $viaArray
     *
     *
     */
    public function editMessageText(
        string                   $text,
        null|int|string          $chat_id,
        ?int                     $message_id,
        ?string                  $inline_message_id,
        ?ParseMode               $parse_mode,
        ?MessageEntityCollection $entities,
        ?bool                    $disable_web_page_preview,
        ?InlineKeyboardMarkup    $reply_markup,
        null|array|ViaArray      $viaArray
    ) {

    }
}
