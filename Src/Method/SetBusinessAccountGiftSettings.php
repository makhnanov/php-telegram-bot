<?php

declare(strict_types=1);

namespace Makhnanov\TelegramBot\Method;

trait SetBusinessAccountGiftSettings
{
    public function setBusinessAccountGiftSettings(
        string $businessConnectionId,
        bool $showGiftButton,
        AcceptedGiftTypes $acceptedGiftTypes,
    ): bool
    {
        $params = [];

        $params['business_connection_id'] = $businessConnectionId;
        $params['show_gift_button'] = $showGiftButton;
        $params['accepted_gift_types'] = $acceptedGiftTypes;

        return $this->api->call('setBusinessAccountGiftSettings', $params);
    }
}
