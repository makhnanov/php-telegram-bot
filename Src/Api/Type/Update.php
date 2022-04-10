<?php

declare(strict_types=1);

namespace Makhnanov\Telegram81\Api\Type;

use GuzzleHttp\Promise\Promise;
use GuzzleHttp\Psr7\Response;
use Makhnanov\Telegram81\Api\Bot;
use Makhnanov\Telegram81\Api\Enumeration\ChatType;
use Makhnanov\Telegram81\Api\Enumeration\ParseMode;
use Makhnanov\Telegram81\Api\Exception\NoResultException;
use Makhnanov\Telegram81\Api\Type\Keyboard\ReplyMarkup;
use Makhnanov\Telegram81\Helper\Informative;
use ReflectionClass;
use ReflectionProperty;

class Update
{
    use Informative;

    /**
     * The update's unique identifier. Update identifiers start from a certain positive number and increase
     * sequentially. This ID becomes especially handy if you're using Webhooks, since it allows you to ignore repeated
     * updates or to restore the correct update sequence, should they get out of order. If there are no new updates for
     * at least a week, then identifier of the next update will be chosen randomly instead of sequentially.
     */
    public readonly int $update_id;

    /**
     * @Optional. New incoming message of any kind — text, photo, sticker, etc.
     */
    public readonly ?Message $message;

    /**
     * @Optional. New version of a message that is known to the bot and was edited
     */
    public readonly ?Message $edited_message;

    /**
     * @Optional. New incoming channel post of any kind — text, photo, sticker, etc.
     */
    public readonly ?Message $channel_post;

    /**
     * @Optional. New version of a channel post that is known to the bot and was edited
     */
    public readonly ?Message $edited_channel_post;

    //    /**
    //     * Optional. New incoming inline query
    //     */
    //    public InlineQuery $inline_query;
    //
    //    /**
    //     * Optional. The result of an inline query that was chosen by a user and sent to their chat partner. Please see our documentation on the feedback collecting for details on how to enable these updates for your bot.
    //     */
    //    public ChosenInlineResult $chosen_inline_result;
    //
    /**
     * @Optional. New incoming callback query
     */
    public readonly ?CallbackQuery $callback_query;
    //
    //    /**
    //     * Optional. New incoming shipping query. Only for invoices with flexible price
    //     */
    //    public ShippingQuery $shipping_query;
    //
    //    /**
    //     * Optional. New incoming pre-checkout query. Contains full information about checkout
    //     */
    //    public PreCheckoutQuery $pre_checkout_query;
    //
    //    /**
    //     * Optional. New poll state. Bots receive only updates about stopped polls and polls, which are sent by the bot
    //     */
    //    public Poll $poll;
    //
    //    /**
    //     * Optional. A user changed their answer in a non-anonymous poll. Bots receive new votes only in polls that were sent by the bot itself.
    //     */
    //    public PollAnswer $poll_answer;
    //
    //    /**
    //     * Optional. The bot's chat member status was updated in a chat. For private chats, this update is received only when the bot is blocked or unblocked by the user.
    //     */
    //    public ChatMemberUpdated $my_chat_member;
    //
    //    /**
    //     * Optional. A chat member's status was updated in a chat. The bot must be an administrator in the chat and must explicitly specify “chat_member” in the list of allowed_updates to receive these updates.
    //     */
    //    public ChatMemberUpdated $chat_member;

    public function __construct(public readonly Bot $b, array|Response|Promise $data = [])
    {
        if (is_array($data)) {
            foreach ((new ReflectionClass($this))->getProperties(ReflectionProperty::IS_PUBLIC) as $property) {
                $propName = $property->getName();
                $propType = $property->getType()->getName();
                $value = null;
                if (class_exists($propType)) {
                    if ($propType === ChatType::class) {
                        $value = ChatType::tryByName($data[$propName], ChatType::undefined);
                    } elseif (isset($data[$propName])) {
                        $value = new $propType($data[$propName]);
                    }
                } else {
                    $value = $data[$propName] ?? null;
                }
                $this->$propName = $value;
            }
        }
    }

    /**
     * @throws NoResultException
     */
    public function sendToChat(
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
        return $this->b->sendMessage(
            ($this->message ?? $this->edited_message)->chat->id,
            $text,
            $parse_mode,
            $entities,
            $disable_web_page_preview,
            $disable_notification,
            $reply_to_message_id,
            $allow_sending_without_reply,
            $reply_markup,
            $viaArray,
        );
    }

    /**
     * @throws NoResultException
     */
    public function sendToSender(
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
        return $this->b->sendMessage(
            ($this->message ?? $this->edited_message)->from->id,
            $text,
            $parse_mode,
            $entities,
            $disable_web_page_preview,
            $disable_notification,
            $reply_to_message_id,
            $allow_sending_without_reply,
            $reply_markup,
            $viaArray,
        );
    }
}
