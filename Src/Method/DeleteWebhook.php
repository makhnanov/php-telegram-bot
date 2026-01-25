<?php

declare(strict_types=1);

namespace Makhnanov\TelegramBot\Method;

trait DeleteWebhook
{
    public function deleteWebhook(
        ?bool $dropPendingUpdates = null,
    ): bool
    {
        $params = [];

        if ($dropPendingUpdates !== null) {
            $params['drop_pending_updates'] = $dropPendingUpdates;
        }

        return $this->api->call('deleteWebhook', $params);
    }
}
