<?php

declare(strict_types=1);

namespace Makhnanov\TelegramBot\Method;

trait AnswerShippingQuery
{
    public function answerShippingQuery(
        string $shippingQueryId,
        bool $ok,
        ?array $shippingOptions = null,
        ?string $errorMessage = null,
    ): bool
    {
        $params = [];

        $params['shipping_query_id'] = $shippingQueryId;
        $params['ok'] = $ok;
        if ($shippingOptions !== null) {
            $params['shipping_options'] = $shippingOptions;
        }
        if ($errorMessage !== null) {
            $params['error_message'] = $errorMessage;
        }

        return $this->api->call('answerShippingQuery', $params);
    }
}
