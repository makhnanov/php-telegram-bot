<?php

namespace Makhnanov\TelegramBot\Api\Method\Send;

use GuzzleHttp\Promise\Promise;
use GuzzleHttp\Psr7\Response;
use GuzzleHttp\Utils;
use Makhnanov\TelegramBot\Api\Enumeration\ParseMode;
use Makhnanov\TelegramBot\Api\Exception\NoResultException;
use Makhnanov\TelegramBot\Api\Type\InputFile;
use Makhnanov\TelegramBot\Api\Type\keyboard\inline\InlineKeyboardMarkup;
use Makhnanov\TelegramBot\Api\Type\Message;
use Makhnanov\TelegramBot\Api\Type\MessageEntityCollection;
use Makhnanov\TelegramBot\Helper\Prepare;
use Makhnanov\TelegramBot\Helper\ResponsiveResultativeInterface;
use Makhnanov\TelegramBot\Helper\ResponsiveResultativeTrait;
use Stringable;

use function Makhnanov\TelegramBot\decoded;

trait SendPhotoTrait
{
    /**
     * @param int|string|Stringable $chat_id Unique identifier for the target chat or username of the target channel (in the format @channelusername)
     * @param string|InputFile $photo or String	Yes	Photo to send. Pass a file_id as String to send a photo that exists on the Telegram servers (recommended), pass an HTTP URL as a String for Telegram to get a photo from the Internet, or upload a new photo using multipart/form-data. The photo must be at most 10 MB in size. The photo's width and height must not exceed 10000 in total. Width and height ratio must be at most 20. More info on Sending Files »
     * @param null|string $caption @Optional Photo caption (may also be used when resending photos by file_id), 0-1024 characters after entities parsing
     * @param null|string|ParseMode $parse_mode @Optional Mode for parsing entities in the photo caption. See formatting options for more details.
     * @param null|array|MessageEntityCollection $caption_entities @Optional	A JSON-serialized list of special entities that appear in the caption, which can be specified instead of parse_mode
     * @param null|bool $disable_notification @Optional	Sends the message silently. Users will receive a notification with no sound.
     * @param null|int $reply_to_message_id @Optional	If the message is a reply, ID of the original message
     * @param null|bool $allow_sending_without_reply @Optional	Pass True, if the message should be sent even if the specified replied-to message is not found
     * @param null|array|InlineKeyboardMarkup $reply_markup @Optional ReplyKeyboardMarkup or ReplyKeyboardRemove or ForceReply	Optional	Additional interface options. A JSON-serialized object for an inline keyboard, custom reply keyboard, instructions to remove reply keyboard or to force a reply from the user.
     */
    public function sendPhoto(
        int|string|Stringable $chat_id,
        string|InputFile $photo,
        ?string $caption = null,
        null|string|ParseMode $parse_mode = null,
        null|array|MessageEntityCollection $caption_entities = null,
        ?bool $disable_notification = null,
        ?int $reply_to_message_id = null,
        ?bool $allow_sending_without_reply = null,
        null|array|InlineKeyboardMarkup $reply_markup = null,
        ?array $viaArray = null,
    ) {
        list($usefulNames, $parameterValues) = $this->viaArray(__FUNCTION__, $viaArray,);
        foreach ($parameterValues as $name => $value) {
            $$name = $value;
        }

        /** @noinspection PhpUnusedLocalVariableInspection */
        $reply_markup = Prepare::replyMarkup($reply_markup);

        return new class($this->getResponse(__FUNCTION__, compact(...$usefulNames)))
            extends Message
            implements ResponsiveResultativeInterface
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