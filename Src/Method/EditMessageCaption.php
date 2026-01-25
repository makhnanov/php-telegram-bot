<?php

declare(strict_types=1);

namespace Makhnanov\TelegramBot\Method;

use Makhnanov\TelegramBot\Type\Message;

trait EditMessageCaption
{
    public function editMessageCaption(
        ?string $businessConnectionId = null,
        int|string|null $chatId = null,
        ?int $messageId = null,
        ?string $inlineMessageId = null,
        ?string $caption = null,
        ?string $parseMode = null,
        ?array $captionEntities = null,
        ?bool $showCaptionAboveMedia = null,
        ?InlineKeyboardMarkup $replyMarkup = null,
    ): Message
    {
        $params = [];

        if ($businessConnectionId !== null) {
            $params['business_connection_id'] = $businessConnectionId;
        }
        if ($chatId !== null) {
            $params['chat_id'] = $chatId;
        }
        if ($messageId !== null) {
            $params['message_id'] = $messageId;
        }
        if ($inlineMessageId !== null) {
            $params['inline_message_id'] = $inlineMessageId;
        }
        if ($caption !== null) {
            $params['caption'] = $caption;
        }
        if ($parseMode !== null) {
            $params['parse_mode'] = $parseMode;
        }
        if ($captionEntities !== null) {
            $params['caption_entities'] = $captionEntities;
        }
        if ($showCaptionAboveMedia !== null) {
            $params['show_caption_above_media'] = $showCaptionAboveMedia;
        }
        if ($replyMarkup !== null) {
            $params['reply_markup'] = $replyMarkup;
        }

        $result = $this->api->call('editMessageCaption', $params);

        return Message::fromArray($result);
    }
}
