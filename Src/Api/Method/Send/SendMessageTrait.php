<?php

declare(strict_types=1);

namespace Makhnanov\Telegram81\Api\Method\Send;

use Makhnanov\Telegram81\Api\Enumeration\ParseMode;
use Makhnanov\Telegram81\Api\Exception\NoResultException;
use Makhnanov\Telegram81\Api\Type\EntityCollection;
use Makhnanov\Telegram81\Api\Type\Keyboard\ReplyMarkup;
use Makhnanov\Telegram81\Api\Type\Message;
use Makhnanov\Telegram81\Helper\Prepare;
use Stringable;
use Yiisoft\Arrays\ArrayHelper;

trait SendMessageTrait
{
    /**
     * @description Use this method to send text messages. On success, the sent Message is returned.
     *
     * @link https://core.telegram.org/bots/api#sendmessage
     *
     * @param int|string $chat_id Unique identifier for the target chat or username of the target
     *                            channel in the format @channelusername
     *
     * @param string $text Text of the message to be sent, 1-4096 characters after entities parsing
     *
     * @param null|string|ParseMode $parse_mode @Optional. Mode for parsing entities in the message text.
     *                                                     See formatting options for more details.
     *
     * @param null|array|EntityCollection $entities @Optional. A JSON-serialized list of special entities that appear
     *                                                         in message text, which can be specified instead of
     *     parse_mode
     *
     * @param null|bool $disable_web_page_preview @Optional. Disables link previews for links in this message
     *
     * @param null|bool $disable_notification @Optional. Sends the message silently.
     *                                                   Users will receive a notification with no sound.
     *
     * @param null|int $reply_to_message_id @Optional. If the message is a reply, ID of the original message
     *
     * @param null|bool $allow_sending_without_reply @Optional. Pass True, if the message should be sent even if
     *                                                          the specified replied-to message is not found
     *
     * @param null|array|ReplyMarkup $reply_markup @Optional. Additional interface options.
     *                                                        A JSON-serialized object for an inline keyboard, custom
     *     reply keyboard, instructions to remove reply keyboard or to force a reply from the user.
     *
     * @param null|array $viaArray keys overwrite vars
     * @see SendMessage for get array keys
     *
     * @return Message
     *
     * @noinspection PhpUnusedParameterInspection
     * @noinspection PhpUnusedLocalVariableInspection
     * @throws NoResultException
     */
    public function sendMessage(
        int|string                  $chat_id,
        string                      $text,
        null|string|ParseMode       $parse_mode = null,
        null|array|EntityCollection $entities = null,
        ?bool                       $disable_web_page_preview = null,
        ?bool                       $disable_notification = null,
        ?int                        $reply_to_message_id = null,
        ?bool                       $allow_sending_without_reply = null,
        null|array|ReplyMarkup      $reply_markup = null,
        ?array                      $viaArray = null,
    ): Message {
        [$parameterNames, $parameterValues] = $this->viaArray(__FUNCTION__, $viaArray);
        foreach ($parameterValues as $name => $value) {
            $$name = $value;
        }

        $text instanceof Stringable and $text = (string)$text;

        if ($parse_mode) {
            if ($parse_mode === ParseMode::MarkdownV2) {
                $text = str_replace('.', '\.', $text);
            }
            $parse_mode = $parse_mode->name;
            ArrayHelper::removeValue($parameterNames, 'entities');
        }

        /** @noinspection PhpUnusedLocalVariableInspection */
        $reply_markup = Prepare::replyMarkup($reply_markup);

        return new Message($this->getResponse(__FUNCTION__, compact(...$parameterNames)));
    }
}
