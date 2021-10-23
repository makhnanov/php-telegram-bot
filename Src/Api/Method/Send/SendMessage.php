<?php

namespace Makhnanov\Telegram81\Api\Method\Send;

class SendMessage
{
    # Required
    public const chat_id = 'chat_id';
    public const text = 'text';

    # Optional
    public const parse_mode = 'parse_mode';
    public const entities = 'entities';
    public const disable_web_page_preview = 'disable_web_page_preview';
    public const disable_notification = 'disable_notification';
    public const reply_to_message_id = 'reply_to_message_id';
    public const allow_sending_without_reply = 'allow_sending_without_reply';
    public const reply_markup = 'reply_markup';
}
