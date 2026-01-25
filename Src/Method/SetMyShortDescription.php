<?php

declare(strict_types=1);

namespace Makhnanov\TelegramBot\Method;

trait SetMyShortDescription
{
    public function setMyShortDescription(
        ?string $shortDescription = null,
        ?string $languageCode = null,
    ): bool
    {
        $params = [];

        if ($shortDescription !== null) {
            $params['short_description'] = $shortDescription;
        }
        if ($languageCode !== null) {
            $params['language_code'] = $languageCode;
        }

        return $this->api->call('setMyShortDescription', $params);
    }
}
