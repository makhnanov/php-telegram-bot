<?php

namespace Makhnanov\Telegram81\Api\Type\Keyboard;

class ReplyKeyboardRow
{
    public array $buttons = [];

    /**
     * Text of the button. If none of the optional fields are used, it will be sent as a message when the button is pressed
     * @Optional. If True, the user's phone number will be sent as a contact when the button is pressed. Available in private chats only
     * @Optional. If True, the user's current location will be sent when the button is pressed. Available in private chats only
     * @Optional. If specified, the user will be asked to create a poll and send it to the bot when the button is pressed. Available in private chats only
     */
    public function addKeyboardButton(
        string                  $text,
        ?bool                   $request_contact = null,
        ?bool                   $request_location = null,
        ?KeyboardButtonPollType $request_poll = null
    ) {
        $this->buttons[] = array_filter(
            compact('text', 'request_contact', 'request_location', 'request_poll'),
            'Makhnanov\Telegram81\is_set'
        );
        return $this;
    }
}
