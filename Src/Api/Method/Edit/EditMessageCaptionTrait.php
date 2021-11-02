<?php

namespace Makhnanov\Telegram81\Api\Method\Edit;

use GuzzleHttp\Exception\BadResponseException;
use GuzzleHttp\Promise\Promise;
use GuzzleHttp\Psr7\Response;
use GuzzleHttp\Utils;
use Makhnanov\Telegram81\Api\Exception\NoResultException;
use Makhnanov\Telegram81\Api\Exception\UnchangedMessageException;
use Makhnanov\Telegram81\Api\Type\keyboard\inline\InlineKeyboardMarkup;
use Makhnanov\Telegram81\Api\Type\Message;
use Makhnanov\Telegram81\Api\Type\MessageEntityCollection;
use Makhnanov\Telegram81\Helper\Prepare;
use Makhnanov\Telegram81\Helper\ResponsiveResultative;
use Makhnanov\Telegram81\Helper\ResponsiveResultativeTrait;

use function Makhnanov\Telegram81\decoded;

trait EditMessageCaptionTrait
{
    /**
     * @description Use this method to edit captions of messages. On success, if the edited message is not
     * an inline message, the edited Message is returned, otherwise True is returned.
     *
     * @link https://core.telegram.org/bots/api#editmessagecaption
     *
     * @param null|int|string $chat_id @Optional @Required if inline_message_id is not specified.
     *                                 Unique identifier for the target chat or username of the target channel
     *                                 in the format @channelusername
     *
     * @param null|int $message_id @Optional @Required if inline_message_id is not specified.
     *                             Identifier of the message to edit
     *
     * @param null|string $inline_message_id @Optional @Required if chat_id and message_id are not specified.
     *                                       Identifier of the inline message
     *
     * @param null|string $caption @Optional New caption of the message, 0-1024 characters after entities parsing
     *
     * @param null|string $parse_mode @Optional Mode for parsing entities in the message caption.
     *                                See formatting options for more details.
     *
     * @param null|array|MessageEntityCollection $caption_entities @Optional A JSON-serialized list of special entities
     *                                      that appear in the caption, which can be specified instead of parse_mode
     *
     * @param null|array|InlineKeyboardMarkup $reply_markup A JSON-serialized object for an inline keyboard.
     *
     * @param null|array $viaArray
     *
     * @return Message&ResponsiveResultative
     * @throws UnchangedMessageException
     * @noinspection PhpIncompatibleReturnTypeInspection
     */
    public function editMessageCaption(
        null|int|string $chat_id = null,
        ?int $message_id = null,
        ?string $inline_message_id = null,
        ?string $caption = null,
        ?string $parse_mode = null,
        null|array|MessageEntityCollection $caption_entities = null,
        null|array|InlineKeyboardMarkup $reply_markup = null,
        ?array $viaArray = null,
    ): Message&ResponsiveResultative {
        list($usefulNames, $parameterValues) = $this->viaArray(__FUNCTION__, $viaArray,);
        foreach ($parameterValues as $name => $value) {
            $$name = $value;
        }
        /** @noinspection PhpUnusedLocalVariableInspection */
        is_array($reply_markup) and $reply_markup and $reply_markup = Utils::jsonEncode($reply_markup);

        try {
            $response = $this->getResponse(__FUNCTION__, compact(...$usefulNames));
        } catch (BadResponseException $e) {
            UnchangedMessageException::process($e);
            throw $e;
        }

        return new class($response) extends Message implements ResponsiveResultative
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
