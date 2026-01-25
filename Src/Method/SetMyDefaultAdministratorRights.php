<?php

declare(strict_types=1);

namespace Makhnanov\TelegramBot\Method;

trait SetMyDefaultAdministratorRights
{
    public function setMyDefaultAdministratorRights(
        ?ChatAdministratorRights $rights = null,
        ?bool $forChannels = null,
    ): bool
    {
        $params = [];

        if ($rights !== null) {
            $params['rights'] = $rights;
        }
        if ($forChannels !== null) {
            $params['for_channels'] = $forChannels;
        }

        return $this->api->call('setMyDefaultAdministratorRights', $params);
    }
}
