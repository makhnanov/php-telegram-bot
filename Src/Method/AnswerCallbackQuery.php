<?php

declare(strict_types=1);

namespace Makhnanov\TelegramBot\Method;

trait AnswerCallbackQuery
{
    public function answerCallbackQuery(
        string $callbackQueryId,
        ?string $text = null,
        ?bool $showAlert = null,
        ?string $url = null,
        ?int $cacheTime = null,
    ): bool
    {
        $params = [];

        $params['callback_query_id'] = $callbackQueryId;
        if ($text !== null) {
            $params['text'] = $text;
        }
        if ($showAlert !== null) {
            $params['show_alert'] = $showAlert;
        }
        if ($url !== null) {
            $params['url'] = $url;
        }
        if ($cacheTime !== null) {
            $params['cache_time'] = $cacheTime;
        }

        return $this->api->call('answerCallbackQuery', $params);
    }
}
