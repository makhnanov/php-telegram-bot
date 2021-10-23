<?php

declare(strict_types=1);

namespace Makhnanov\Telegram81\Api\Method\Send;

use GuzzleHttp\Promise\Promise;
use GuzzleHttp\Psr7\Response;
use Makhnanov\Telegram81\Api\Enumeration\ParseMode;
use Makhnanov\Telegram81\Api\Exception\BadCodeException;
use Makhnanov\Telegram81\Api\Exception\NoResultException;
use Makhnanov\Telegram81\Api\Type\EntityCollection;
use Makhnanov\Telegram81\Api\Type\Message;
use Makhnanov\Telegram81\Api\Type\ReplyMarkup;
use Makhnanov\Telegram81\Helper\Responsive;
use Makhnanov\Telegram81\Helper\ResponsiveInterface;
use Makhnanov\Telegram81\Helper\ResponsiveResultative;
use Makhnanov\Telegram81\Helper\ResponsiveResultativeTrait;
use Makhnanov\Telegram81\Helper\ViaArray;

use ReflectionClass;

use ReflectionNamedType;
use ReflectionUnionType;

use TypeError;

use Yiisoft\Arrays\ArrayHelper;

use function Makhnanov\Telegram81\decoded;

trait SendMessageTrait
{
    /**
     * @link https://core.telegram.org/bots/api#sendmessage
     *
     * @property int|string $chat_id                    Unique identifier for the target chat or username of the target
     *                                                  channel in the format @channelusername
     *
     * @property string $text                           Text of the message to be sent, 1-4096 characters after entities parsing
     *
     * @property ?string $parse_mode                    @Optional. Mode for parsing entities in the message text.
     *                                                  See formatting options for more details.
     *
     * property ?MessageEntity[] $entities              @Optional. A JSON-serialized list of special entities that appear
     *                                                  in message text, which can be specified instead of parse_mode
     *
     * @property ?bool $disable_web_page_preview        @Optional. Disables link previews for links in this message
     *
     * @property ?bool $disable_notification            @Optional. Sends the message silently.
     *                                                  Users will receive a notification with no sound.
     *
     * @property ?int $reply_to_message_id              @Optional. If the message is a reply, ID of the original message
     *
     * @property ?Boolean $allow_sending_without_reply  @Optional. Pass True, if the message should be sent even if
     *                                                  the specified replied-to message is not found
     *
     * @property ?ReplyMarkup $reply_markup             @Optional. Additional interface options.
     *                                                  A JSON-serialized object for an inline keyboard, custom reply keyboard,
     *                                                  instructions to remove reply keyboard or to force a reply from the user.
     *
     * @property ?ViaArray $viaArray
     *
     * @noinspection PhpUnusedParameterInspection
     * @noinspection PhpUnusedLocalVariableInspection
     */
    public function sendMessage(
        int|string                  $chat_id,
        string                      $text,
        ?ParseMode                  $parse_mode = null,
        null|array|EntityCollection $entities = null,
        ?bool                       $disable_web_page_preview = null,
        ?bool                       $disable_notification = null,
        ?int                        $reply_to_message_id = null,
        ?bool                       $allow_sending_without_reply = null,
        null|array|ReplyMarkup      $reply_markup = null,
        ?ViaArray                   $viaArray = null,
    ): Message & ResponsiveResultative {
        /** @noinspection PhpUnhandledExceptionInspection */
        $inputParameters = (new ReflectionClass($this))->getMethod(__FUNCTION__)->getParameters();
        $inputParameterNames = [];
        foreach ($inputParameters as $oneParameter) {
            $parameterName = $oneParameter->getName();
            $inputParameterNames[] = $parameterName;
            if (!$oneParameter->hasType()) {
                /** @noinspection PhpUnhandledExceptionInspection */
                throw new BadCodeException();
            }
            if (isset($viaArray->$parameterName)) {
                $declarationParameterType = $oneParameter->getType();
                if ($declarationParameterType instanceof ReflectionNamedType) {
                    $typeOrClass = $declarationParameterType->getName();
                    if (
                        !(class_exists($typeOrClass) && is_a($viaArray->$parameterName, $typeOrClass))
                        && $typeOrClass !== gettype($viaArray->$parameterName)
                        && !( // fix
                            $typeOrClass === 'bool'
                            && gettype($viaArray->$parameterName) === 'boolean'
                        )
                    ) {
                        throw new TypeError();
                    }
                    $$parameterName = $viaArray->$parameterName;
                } elseif ($declarationParameterType instanceof ReflectionUnionType) {
                    $throw = true;
                    foreach ($declarationParameterType->getTypes() as $type) {
                        $typeOrClass = $type->getName();
                        if (
                            (class_exists($typeOrClass) && is_a($viaArray->$parameterName, $typeOrClass))
                            || $typeOrClass === gettype($viaArray->$parameterName)
                        ) {
                            $throw = false;
                            break;
                        }
                    }
                    $throw and throw new TypeError();
                    $$parameterName = $viaArray->$parameterName;
                }
            }
        }
        unset($inputParameterNames['viaArray']);

        if ($parse_mode) {
            if ($parse_mode === ParseMode::MarkdownV2) {
                $text = str_replace('.', '\.', $text);
            }
            $parse_mode = $parse_mode->name;
            ArrayHelper::removeValue($inputParameterNames, 'entities');
        }

        if ($reply_markup) {
            if (is_array($reply_markup)) {
                $reply_markup = json_encode($reply_markup);
            } /** @noinspection PhpStatementHasEmptyBodyInspection */ elseif ($reply_markup instanceof ReplyMarkup) {
                # todo
            }
        }

        /** @noinspection PhpIncompatibleReturnTypeInspection */
        return new class($this->getResponse(__FUNCTION__, compact(...$inputParameterNames)))
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
