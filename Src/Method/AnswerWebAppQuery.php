<?php

declare(strict_types=1);

namespace Makhnanov\TelegramBot\Method;

use Makhnanov\TelegramBot\Type\SentWebAppMessage;

trait AnswerWebAppQuery
{
    public function answerWebAppQuery(
        string $webAppQueryId,
        InlineQueryResult $result,
    ): SentWebAppMessage
    {
        $params = [];

        $params['web_app_query_id'] = $webAppQueryId;
        $params['result'] = $result;

        $result = $this->api->call('answerWebAppQuery', $params);

        return SentWebAppMessage::fromArray($result);
    }
}
