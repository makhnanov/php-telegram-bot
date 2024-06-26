<?php

namespace Makhnanov\Telegram81\Api\Type;

use Makhnanov\Telegram81\Api\Bot;
use Makhnanov\Telegram81\Api\Type\Helpers\UpdateSugar;

/**
 * @example Click by inline button in channel [
 *     "update_id" => 494785812,
 *     "callback_query" => [
 *         "id" => "1679078867284838012",
 *         "from" => [
 *             "id" => 390941013,
 *             "is_bot" => false,
 *             "first_name" => "Роман",
 *             "last_name" => "Бакиров",
 *             "username" => "BakirovRoman",
 *             "language_code" => "en",
 *         ],
 *         "message" => [
 *             "message_id" => 265,
 *             "sender_chat" => [
 *                 "id" => -1001286401059,
 *                 "title" => "ProgMemes",
 *                 "username" => "program_mem",
 *                 "type" => "channel",
 *             ],
 *             "chat" => [
 *                 "id" => -1001286401059,
 *                 "title" => "ProgMemes",
 *                 "username" => "program_mem",
 *                 "type" => "channel",
 *             ],
 *             "date" => 1634983108,
 *             "text" => "
 *         🇺🇸 Welcome to Sea Battle! 🛳 🚢 \n
 *         Please, select language.\n
 *         \n
 *         🇷🇺 Добро пожаловать в Морской Бой!\n
 *         Пожалуйста, выберите язык.
 *         ",
 *             "reply_markup" => [
 *                 "inline_keyboard" => [
 *                     [
 *                         [
 *                             "text" => "Русский 🇷🇺",
 *                             "callback_data" => "RUSSIAN",
 *                         ],
 *                         [
 *                             "text" => "English 🇺🇸",
 *                             "callback_data" => "ENGLISH",
 *                         ],
 *                     ],
 *                 ],
 *             ],
 *         ],
 *         "chat_instance" => "8388286833059514659",
 *         "data" => "RUSSIAN",
 *     ],
 * ];
 *
 * @example Click by inline button in private chat with bot [
 *     "update_id" => 494785814,
 *     "callback_query" => [
 *         "id" => "1679078865787713631",
 *         "from" => [
 *             "id" => 390941013,
 *             "is_bot" => false,
 *             "first_name" => "Роман",
 *             "last_name" => "Бакиров",
 *             "username" => "BakirovRoman",
 *             "language_code" => "en",
 *         ],
 *         "message" => [
 *             "message_id" => 173,
 *             "from" => [
 *                 "id" => 2039116336,
 *                 "is_bot" => true,
 *                 "first_name" => "TestPhp81BotApi",
 *                 "username" => "TestPhp81BotApiBot",
 *             ],
 *             "chat" => [
 *                 "id" => 390941013,
 *                 "first_name" => "Роман",
 *                 "last_name" => "Бакиров",
 *                 "username" => "BakirovRoman",
 *                 "type" => "private",
 *             ],
 *             "date" => 1635079737,
 *             "text" => "
 *         🇺🇸 Welcome to Sea Battle! 🛳 🚢 \n
 *         Please, select language.\n
 *         \n
 *         🇷🇺 Добро пожаловать в Морской Бой!\n
 *         Пожалуйста, выберите язык.
 *         ",
 *             "reply_markup" => [
 *                 "inline_keyboard" => [
 *                     [
 *                         [
 *                             "text" => "Русский 🇷🇺",
 *                             "callback_data" => "RUSSIAN",
 *                         ],
 *                         [
 *                             "text" => "English 🇺🇸",
 *                             "callback_data" => "ENGLISH",
 *                         ],
 *                     ],
 *                 ],
 *             ],
 *         ],
 *         "chat_instance" => "3209964680490799795",
 *         "data" => "RUSSIAN",
 *     ],
 * ];
 *
 * @example
 *
 */
class Update extends SelfFilling
{
    readonly public Bot $bot;

    use UpdateSugar;

    /**
     * The update's unique identifier. Update identifiers start from a certain positive number and increase sequentially. This ID becomes especially handy if you're using Webhooks, since it allows you to ignore repeated updates or to restore the correct update sequence, should they get out of order. If there are no new updates for at least a week, then identifier of the next update will be chosen randomly instead of sequentially.
     */
    public int $update_id;

    /**
     * @Optional. New incoming message of any kind — text, photo, sticker, etc.
     */
    public ?Message $message;

    /**
     * @Optional. New version of a message that is known to the bot and was edited
     */
    public ?Message $edited_message;

    /**
     * @Optional. New incoming channel post of any kind — text, photo, sticker, etc.
     */
    public ?Message $channel_post;

    /**
     * @Optional. New version of a channel post that is known to the bot and was edited
     */
    public ?Message $edited_channel_post;

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
    public ?CallbackQuery $callback_query;
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
}
