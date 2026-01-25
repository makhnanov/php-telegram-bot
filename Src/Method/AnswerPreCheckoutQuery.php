<?php

declare(strict_types=1);

namespace Makhnanov\TelegramBot\Method;

use Makhnanov\TelegramBot\Type\Bot;

trait AnswerPreCheckoutQuery
{
    public function answerPreCheckoutQuery(
        string $preCheckoutQueryId,
        bool $ok,
        ?string $errorMessage = null,
    ): Bot
    {
        $params = [];

        $params['pre_checkout_query_id'] = $preCheckoutQueryId;
        $params['ok'] = $ok;
        if ($errorMessage !== null) {
            $params['error_message'] = $errorMessage;
        }

        $result = $this->api->call('answerPreCheckoutQuery', $params);

        return Bot::fromArray($result);
    }
}
