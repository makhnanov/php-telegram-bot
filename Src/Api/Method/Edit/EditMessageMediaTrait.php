<?php

namespace Makhnanov\Telegram81\Api\Method\Edit;

use GuzzleHttp\Promise\Promise;
use GuzzleHttp\Psr7\Response;
use GuzzleHttp\Utils;
use Makhnanov\Telegram81\Api\Exception\NoResultException;
use Makhnanov\Telegram81\Api\Type\InputMedia;
use Makhnanov\Telegram81\Api\Type\keyboard\inline\InlineKeyboardMarkup;
use Makhnanov\Telegram81\Api\Type\Message;
use Makhnanov\Telegram81\Helper\ResponsiveResultative;
use Makhnanov\Telegram81\Helper\ResponsiveResultativeTrait;
use Stringable;

use function Makhnanov\Telegram81\decoded;

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
     * @return Message|ResponsiveResultative
     */
    public function editMessageMedia(
        array|InputMedia                $media,
        null|int|string|Stringable      $chat_id = null,
        ?int                            $message_id = null,
        ?string                         $inline_message_id = null,
        null|array|InlineKeyboardMarkup $reply_markup = null,
        ?array                          $viaArray = null,
    ) {
        list($usefulNames, $parameterValues) = $this->viaArray(__FUNCTION__, $viaArray,);
        foreach ($parameterValues as $name => $value) {
            $$name = $value;
        }

        /** @noinspection PhpUnusedLocalVariableInspection */
        is_array($media) and $media = Utils::jsonEncode($media);

        return new class($this->getResponse(__FUNCTION__, compact(...$usefulNames)))
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
