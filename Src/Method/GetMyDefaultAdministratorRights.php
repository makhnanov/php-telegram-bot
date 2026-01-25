<?php

declare(strict_types=1);

namespace Makhnanov\TelegramBot\Method;

use Makhnanov\TelegramBot\Type\ChatAdministratorRights;

trait GetMyDefaultAdministratorRights
{
    public function getMyDefaultAdministratorRights(
        ?bool $forChannels = null,
    ): ChatAdministratorRights
    {
        $params = [];

        if ($forChannels !== null) {
            $params['for_channels'] = $forChannels;
        }

        $result = $this->api->call('getMyDefaultAdministratorRights', $params);

        return ChatAdministratorRights::fromArray($result);
    }
}
