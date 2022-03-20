<?php
/** @noinspection PhpReturnDocTypeMismatchInspection */

namespace Makhnanov\Telegram81\Api\Method\Edit;

use GuzzleHttp\Exception\BadResponseException;
use GuzzleHttp\Promise\Promise;
use GuzzleHttp\Psr7\Response;
use Makhnanov\Telegram81\Api\Enumeration\ParseMode;
use Makhnanov\Telegram81\Api\Exception\NoResultException;
use Makhnanov\Telegram81\Api\Exception\UnchangedMessageException;
use Makhnanov\Telegram81\Api\Type\keyboard\inline\InlineKeyboardMarkup;
use Makhnanov\Telegram81\Api\Type\Message;
use Makhnanov\Telegram81\Api\Type\MessageEntityCollection;
use Makhnanov\Telegram81\Helper\Prepare;
use Makhnanov\Telegram81\Helper\ResponsiveResultativeInterface;
use Makhnanov\Telegram81\Helper\ResponsiveResultativeTrait;

use Stringable;

use function Makhnanov\Telegram81\jDecode;

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
     * @param string|Stringable $text New text of the message, 1-4096 characters after entities parsing
     *
     * @param null|int|string|Stringable $chat_id @Optional. Required if inline_message_id is not specified.
     *                                                       Unique identifier for the target chat or username
     *                                                       of the target channel in the format @channelusername
     *
     * @param null|int $message_id @Optional. Required if inline_message_id is not specified.
     * Identifier of the message to edit
     *
     * @param null|string|Stringable $inline_message_id @Optional. Required if chat_id and message_id are not specified.
     *                                   Identifier of the inline message
     *
     * @param null|ParseMode $parse_mode @Optional. Mode for parsing entities in the message text.
     *                               See formatting options for more details.
     *
     * @param null|MessageEntityCollection $entities @Optional. A JSON-serialized list of special entities that appear
     *                                           in message text, which can be specified instead of parse_mode
     *
     * @param null|Boolean $disable_web_page_preview @Optional. Disables link previews for links in this message
     *
     * @param null|array|InlineKeyboardMarkup $reply_markup @Optional. A JSON-serialized object for an inline keyboard.
     *
     * @param null|array $viaArray
     *
     * @return Message&ResponsiveResultativeInterface
     *
     * @throws UnchangedMessageException
     * @noinspection PhpUnusedParameterInspection
     */
    public function editMessageText(
        string|Stringable               $text,
        null|int|string|Stringable      $chat_id = null,
        null|int|string|Stringable      $message_id = null,
        null|string|Stringable          $inline_message_id = null,
        ?ParseMode                      $parse_mode = null,
        ?MessageEntityCollection        $entities = null,
        ?bool                           $disable_web_page_preview = null,
        null|array|InlineKeyboardMarkup $reply_markup = null,
        ?array                          $viaArray = null,
    ): Message & ResponsiveResultativeInterface {
        [$usefulNames, $parameterValues] = $this->viaArray(
            __FUNCTION__,
            $viaArray,
            ['ignoreExceptionIfUnchanged']
        );
        foreach ($parameterValues as $name => $value) {
            $$name = $value;
        }

        $text instanceof Stringable and $text = (string)$chat_id;
        $chat_id and $chat_id instanceof Stringable and $chat_id = (string)$chat_id;
        $inline_message_id and $inline_message_id instanceof Stringable and $inline_message_id = (string)$chat_id;

        /** @noinspection PhpUnusedLocalVariableInspection */
        $reply_markup = Prepare::replyMarkup($reply_markup);

        try {
            $response = $this->getResponse(__FUNCTION__, compact(...$usefulNames));
        } catch (BadResponseException $e) {
            UnchangedMessageException::process($e);
            throw $e;
        }

        return new class($response) extends Message implements ResponsiveResultativeInterface
        {
            use ResponsiveResultativeTrait;

            private array $result;

            private Response $response;

            public function __construct(Promise|Response|array $data = [])
            {
                $this->response = $data;
                $this->result = jDecode($this->response)['result'] ?? throw new NoResultException();
                parent::__construct($this->result);
            }
        };
    }
}
