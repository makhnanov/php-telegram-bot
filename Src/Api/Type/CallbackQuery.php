<?php

namespace Makhnanov\Telegram81\Api\Type;

class CallbackQuery extends SelfFilling
{
    /**
     * Unique identifier for this query
     */
    public string $id;

    /**
     * Sender
     */
    public User $from;

    /**
     * Global identifier, uniquely corresponding to the chat to which the message with the callback button was sent.
     * Useful for high scores in games.
     */
    public string $chat_instance;

    /**
     * @Optional. Message with the callback button that originated the query. Note that message content and message date will not be available if the message is too old
     */
    public ?Message $message;

    /**
     * @Optional. Identifier of the message sent via the bot in inline mode, that originated the query.
     */
    public ?string $inline_message_id;

    /**
     * @Optional. Data associated with the callback button. Be aware that a bad client can send arbitrary data in this field.
     */
    public ?string $data;

    /**
     * @Optional. Short name of a Game to be returned, serves as the unique identifier for the game
     */
    public ?string $game_short_name;
}
