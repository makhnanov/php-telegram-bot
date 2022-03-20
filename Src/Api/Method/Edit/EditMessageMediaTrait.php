<?php

namespace Makhnanov\Telegram81\Api\Method\Edit;

use GuzzleHttp\Exception\BadResponseException;
use GuzzleHttp\Promise\Promise;
use GuzzleHttp\Psr7\Response;
use GuzzleHttp\Utils;
use Makhnanov\Telegram81\Api\Exception\NoResultException;
use Makhnanov\Telegram81\Api\Exception\UnchangedMessageException;
use Makhnanov\Telegram81\Api\Type\InputMedia;
use Makhnanov\Telegram81\Api\Type\keyboard\inline\InlineKeyboardMarkup;
use Makhnanov\Telegram81\Api\Type\Message;
use Makhnanov\Telegram81\Helper\Prepare;
use Makhnanov\Telegram81\Helper\ResponsiveResultativeInterface;
use Makhnanov\Telegram81\Helper\ResponsiveResultativeTrait;
use Stringable;

use function Makhnanov\Telegram81\jDecode;

trait EditMessageMediaTrait
{
    /**
     * @param array|InputMedia $media A JSON-serialized object for a new media content of the message
     *
     * @param null|int|string|Stringable $chat_id @Optional @Required if inline_message_id is not specified.
     *                                                      Unique identifier for the target chat or username of the
     *                                                      target channel in the format @channelusername
     *
     * @param null|int $message_id @Optional @Required if inline_message_id is not specified.
     *                                       Identifier of the message to edit
     *
     * @param null|string $inline_message_id @Optional @Required if chat_id and message_id are not specified.
     *                                                 Identifier of the inline message
     *
     *
     * @param null|array|InlineKeyboardMarkup $reply_markup @Optional A JSON-serialized object for a new inline keyboard.
     *
     * @param null|array $viaArray
     *
     * @return Message|ResponsiveResultativeInterface
     *
     * @throws UnchangedMessageException
     */
    public function editMessageMedia(
        array|InputMedia                $media,
        null|int|string|Stringable      $chat_id = null,
        ?int                            $message_id = null,
        ?string                         $inline_message_id = null,
        null|array|InlineKeyboardMarkup $reply_markup = null,
        ?array                          $viaArray = null,
    ): ResponsiveResultativeInterface|Message {
        [$usefulNames, $parameterValues] = $this->viaArray(__FUNCTION__, $viaArray,);
        foreach ($parameterValues as $name => $value) {
            $$name = $value;
        }

        /** @noinspection PhpUnusedLocalVariableInspection */
        is_array($media) and $media = Utils::jsonEncode($media);
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
