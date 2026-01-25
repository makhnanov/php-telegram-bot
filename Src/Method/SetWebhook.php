<?php

declare(strict_types=1);

namespace Makhnanov\TelegramBot\Method;

trait SetWebhook
{
    public function setWebhook(
        string $url,
        ?string $certificate = null,
        ?string $ipAddress = null,
        ?int $maxConnections = null,
        ?array $allowedUpdates = null,
        ?bool $dropPendingUpdates = null,
        ?string $secretToken = null,
    ): bool
    {
        $params = [];

        $params['url'] = $url;
        if ($certificate !== null) {
            $params['certificate'] = $certificate;
        }
        if ($ipAddress !== null) {
            $params['ip_address'] = $ipAddress;
        }
        if ($maxConnections !== null) {
            $params['max_connections'] = $maxConnections;
        }
        if ($allowedUpdates !== null) {
            $params['allowed_updates'] = $allowedUpdates;
        }
        if ($dropPendingUpdates !== null) {
            $params['drop_pending_updates'] = $dropPendingUpdates;
        }
        if ($secretToken !== null) {
            $params['secret_token'] = $secretToken;
        }

        return $this->api->call('setWebhook', $params);
    }
}
