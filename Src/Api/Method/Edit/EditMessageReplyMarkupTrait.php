<?php

namespace Makhnanov\Telegram81\Api\Method\Edit;

use GuzzleHttp\Exception\BadResponseException;
use GuzzleHttp\Promise\Promise;
use GuzzleHttp\Psr7\Response;
use Makhnanov\Telegram81\Api\Exception\NoResultException;
use Makhnanov\Telegram81\Api\Exception\UnchangedMessageException;
use Makhnanov\Telegram81\Api\Type\keyboard\inline\InlineKeyboardMarkup;
use Makhnanov\Telegram81\Api\Type\Message;
use Makhnanov\Telegram81\Helper\Prepare;
use Makhnanov\Telegram81\Helper\ResponsiveResultativeInterface;
use Makhnanov\Telegram81\Helper\ResponsiveResultativeTrait;

use function Makhnanov\Telegram81\jDecode;

trait EditMessageReplyMarkupTrait
{
    /**
     * @description Use this method to edit only the reply markup of messages. On success, if the edited message is not
     * an inline message, the edited Message is returned, otherwise True is returned.
     *
     * @link https://core.telegram.org/bots/api#editmessagecaption
     *
     * @param null|int|string $chat_id @Optional Required if inline_message_id is not specified.
     * Unique identifier for the target chat or username of the target channel (in the format @channelusername)
     *
     * @param null|int $message_id @Optional Required if inline_message_id is not specified.
     * Identifier of the message to edit
     *
     * @param null|string $inline_message_id @Optional Required if chat_id and message_id are not specified.
     * Identifier of the inline message
     *
     * @param null|array|InlineKeyboardMarkup $reply_markup @Optional A JSON-serialized object for an inline keyboard.
     *
     * @throws UnchangedMessageException
     */
    public function editMessageReplyMarkup(
        null|int|string                 $chat_id = null,
        ?int                            $message_id = null,
        ?string                         $inline_message_id = null,
        null|array|InlineKeyboardMarkup $reply_markup = null,
        ?array                          $viaArray = null,
    ): Message&ResponsiveResultativeInterface {
        [$usefulNames, $parameterValues] = $this->viaArray(__FUNCTION__, $viaArray,);
        foreach ($parameterValues as $name => $value) {
            $$name = $value;
        }

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
