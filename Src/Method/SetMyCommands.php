<?php

declare(strict_types=1);

namespace Makhnanov\TelegramBot\Method;

trait SetMyCommands
{
    public function setMyCommands(
        array $commands,
        ?BotCommandScope $scope = null,
        ?string $languageCode = null,
    ): bool
    {
        $params = [];

        $params['commands'] = $commands;
        if ($scope !== null) {
            $params['scope'] = $scope;
        }
        if ($languageCode !== null) {
            $params['language_code'] = $languageCode;
        }

        return $this->api->call('setMyCommands', $params);
    }
}
