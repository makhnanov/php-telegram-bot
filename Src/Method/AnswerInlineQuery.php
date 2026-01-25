<?php

declare(strict_types=1);

namespace Makhnanov\TelegramBot\Method;

trait AnswerInlineQuery
{
    public function answerInlineQuery(
        string $inlineQueryId,
        array $results,
        ?int $cacheTime = null,
        ?bool $isPersonal = null,
        ?string $nextOffset = null,
        ?InlineQueryResultsButton $button = null,
    ): bool
    {
        $params = [];

        $params['inline_query_id'] = $inlineQueryId;
        $params['results'] = $results;
        if ($cacheTime !== null) {
            $params['cache_time'] = $cacheTime;
        }
        if ($isPersonal !== null) {
            $params['is_personal'] = $isPersonal;
        }
        if ($nextOffset !== null) {
            $params['next_offset'] = $nextOffset;
        }
        if ($button !== null) {
            $params['button'] = $button;
        }

        return $this->api->call('answerInlineQuery', $params);
    }
}
