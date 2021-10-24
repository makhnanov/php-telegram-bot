<?php

namespace Makhnanov\Telegram81\Api\Method\Edit;

use GuzzleHttp\Promise\Promise;
use GuzzleHttp\Psr7\Response;
use Makhnanov\Telegram81\Api\Enumeration\ParseMode;
use Makhnanov\Telegram81\Api\Exception\NoResultException;
use Makhnanov\Telegram81\Api\Type\keyboard\inline\InlineKeyboardMarkup;
use Makhnanov\Telegram81\Api\Type\Message;
use Makhnanov\Telegram81\Api\Type\MessageEntityCollection;
use Makhnanov\Telegram81\Helper\Prepare;
use Makhnanov\Telegram81\Helper\ResponsiveResultative;
use Makhnanov\Telegram81\Helper\ResponsiveResultativeTrait;

use function Makhnanov\Telegram81\decoded;

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
     * @param null|array|InlineKeyboardMarkup $reply_markup @Optional. A JSON-serialized object for an inline keyboard.
     *
     * @param ?array $viaArray
     *
     * @throws \Makhnanov\Telegram81\Api\Exception\BadCodeException
     *
     * @return Message & ResponsiveResultative
     */
    public function editMessageText(
        string                          $text,
        null|int|string                 $chat_id = null,
        ?int                            $message_id = null,
        ?string                         $inline_message_id = null,
        ?ParseMode                      $parse_mode = null,
        ?MessageEntityCollection        $entities = null,
        ?bool                           $disable_web_page_preview = null,
        null|array|InlineKeyboardMarkup $reply_markup = null,
        ?array                          $viaArray = null,
    ): Message & ResponsiveResultative {
        list($parameterNames, $parameterValues) = $this->viaArray(__FUNCTION__, $viaArray);
        foreach ($parameterValues as $name => $value) {
            $$name = $value;
        }

        isset($reply_markup) and $reply_markup = Prepare::replyMarkup($reply_markup);

        return new class($this->getResponse(__FUNCTION__, compact(...$parameterNames)))
            extends Message
            implements ResponsiveResultative
        {
            use ResponsiveResultativeTrait;

            private array $result;

            private Response $response;

            public function __construct(Promise|Response|array $data = [])
            {
                $this->response = $data;
                $this->result = decoded($this->response)['result'] ?? throw new NoResultException();
                parent::__construct($this->result);
            }
        };
    }
}
