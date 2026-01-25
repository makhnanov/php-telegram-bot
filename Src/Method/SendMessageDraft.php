<?php

declare(strict_types=1);

namespace Makhnanov\TelegramBot\Method;

trait SendMessageDraft
{
    public function sendMessageDraft(
        int $chatId,
        int $draftId,
        string $text,
        ?int $messageThreadId = null,
        ?string $parseMode = null,
        ?array $entities = null,
    ): bool
    {
        $params = [];

        $params['chat_id'] = $chatId;
        if ($messageThreadId !== null) {
            $params['message_thread_id'] = $messageThreadId;
        }
        $params['draft_id'] = $draftId;
        $params['text'] = $text;
        if ($parseMode !== null) {
            $params['parse_mode'] = $parseMode;
        }
        if ($entities !== null) {
            $params['entities'] = $entities;
        }

        return $this->api->call('sendMessageDraft', $params);
    }
}
