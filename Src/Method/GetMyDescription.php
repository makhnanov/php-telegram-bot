<?php

declare(strict_types=1);

namespace Makhnanov\TelegramBot\Method;

use Makhnanov\TelegramBot\Type\BotDescription;

trait GetMyDescription
{
    public function getMyDescription(
        ?string $languageCode = null,
    ): BotDescription
    {
        $params = [];

        if ($languageCode !== null) {
            $params['language_code'] = $languageCode;
        }

        $result = $this->api->call('getMyDescription', $params);

        return BotDescription::fromArray($result);
    }
}
