<?php

namespace Makhnanov\Telegram81\Api\Method\Edit;

/**
 * @see EditMessageTextTrait
 */
class EditMessageText
{
    /**
     * @Required
     */
    public const text = 'text';

    /**
     * @Optional
     */
    public const chat_id = 'chat_id';
    public const message_id = 'message_id';
    public const inline_message_id = 'inline_message_id';
    public const parse_mode = 'parse_mode';
    public const entities = 'entities';
    public const disable_web_page_preview = 'disable_web_page_preview';
    public const reply_markup = 'reply_markup';
}
