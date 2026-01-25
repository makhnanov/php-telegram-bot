<?php

declare(strict_types=1);

namespace Makhnanov\TelegramBot\Method;

trait SetMyName
{
    public function setMyName(
        ?string $name = null,
        ?string $languageCode = null,
    ): bool
    {
        $params = [];

        if ($name !== null) {
            $params['name'] = $name;
        }
        if ($languageCode !== null) {
            $params['language_code'] = $languageCode;
        }

        return $this->api->call('setMyName', $params);
    }
}
