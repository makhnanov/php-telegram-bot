<?php

declare(strict_types=1);

namespace Makhnanov\TelegramBot\Method;

use Makhnanov\TelegramBot\Type\WebhookInfo;

trait GetWebhookInfo
{
    public function getWebhookInfo(): WebhookInfo
    {
        $params = [];

        $result = $this->api->call('getWebhookInfo', $params);

        return WebhookInfo::fromArray($result);
    }
}
