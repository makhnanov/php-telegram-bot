<?php

declare(strict_types=1);

namespace Makhnanov\TelegramBot\Method;

use Makhnanov\TelegramBot\Type\Message;

trait EditMessageText
{
    public function editMessageText(
        string $text,
        ?string $businessConnectionId = null,
        int|string|null $chatId = null,
        ?int $messageId = null,
        ?string $inlineMessageId = null,
        ?string $parseMode = null,
        ?array $entities = null,
        ?LinkPreviewOptions $linkPreviewOptions = null,
        InlineKeyboardMarkup|array|null $replyMarkup = null,
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
        $params['text'] = $text;
        if ($parseMode !== null) {
            $params['parse_mode'] = $parseMode;
        }
        if ($entities !== null) {
            $params['entities'] = $entities;
        }
        if ($linkPreviewOptions !== null) {
            $params['link_preview_options'] = $linkPreviewOptions;
        }
        if ($replyMarkup !== null) {
            $params['reply_markup'] = $replyMarkup;
        }

        $result = $this->api->call('editMessageText', $params);

        return Message::fromArray($result);
    }
}
