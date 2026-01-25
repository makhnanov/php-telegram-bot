<?php

declare(strict_types=1);

namespace Makhnanov\TelegramBot\Method;

trait DeleteMyCommands
{
    public function deleteMyCommands(
        ?BotCommandScope $scope = null,
        ?string $languageCode = null,
    ): bool
    {
        $params = [];

        if ($scope !== null) {
            $params['scope'] = $scope;
        }
        if ($languageCode !== null) {
            $params['language_code'] = $languageCode;
        }

        return $this->api->call('deleteMyCommands', $params);
    }
}
