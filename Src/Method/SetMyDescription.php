<?php

declare(strict_types=1);

namespace Makhnanov\TelegramBot\Method;

trait SetMyDescription
{
    public function setMyDescription(
        ?string $description = null,
        ?string $languageCode = null,
    ): bool
    {
        $params = [];

        if ($description !== null) {
            $params['description'] = $description;
        }
        if ($languageCode !== null) {
            $params['language_code'] = $languageCode;
        }

        return $this->api->call('setMyDescription', $params);
    }
}
