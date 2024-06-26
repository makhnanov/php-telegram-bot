<?php

declare(strict_types=1);

namespace Makhnanov\Telegram81\Api\Type\Helpers;

use Exception;
use Makhnanov\Telegram81\Api\Enumeration\ParseMode;
use Makhnanov\Telegram81\Api\Type\EntityCollection;
use Makhnanov\Telegram81\Api\Type\Keyboard\ReplyMarkup;
use Makhnanov\Telegram81\Api\Type\Message;
use Makhnanov\Telegram81\Helper\ResponsiveResultativeInterface;

trait UpdateSugar
{
    public function isPrivateMessage(): bool
    {
        return
            $this?->message?->from->id
            && $this?->message->chat->id
            && $this->message->from->id === $this->message->chat->id;
    }

    /**
     * @throws Exception
     */
    public function replyMessage(
        string                      $text,
        null|string|ParseMode       $parse_mode = null,
        null|array|EntityCollection $entities = null,
        ?bool                       $disable_web_page_preview = null,
        ?bool                       $disable_notification = null,
        ?int                        $reply_to_message_id = null,
        ?bool                       $allow_sending_without_reply = null,
        null|array|ReplyMarkup      $reply_markup = null,
        ?array                      $viaArray = null,
    ): Message & ResponsiveResultativeInterface {
        $chatId = $this?->message->chat->id;
        if (!$chatId) {
            throw new Exception('Message not found.');
        }
        return $this->bot->sendMessage(
            $chatId,
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
