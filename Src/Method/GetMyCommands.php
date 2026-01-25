<?php

declare(strict_types=1);

namespace Makhnanov\TelegramBot\Method;

trait GetMyCommands
{
    public function getMyCommands(
        ?BotCommandScope $scope = null,
        ?string $languageCode = null,
    ): array
    {
        $params = [];

        if ($scope !== null) {
            $params['scope'] = $scope;
        }
        if ($languageCode !== null) {
            $params['language_code'] = $languageCode;
        }

        return $this->api->call('getMyCommands', $params);
    }
}
