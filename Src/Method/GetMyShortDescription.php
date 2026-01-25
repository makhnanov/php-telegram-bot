<?php

declare(strict_types=1);

namespace Makhnanov\TelegramBot\Method;

use Makhnanov\TelegramBot\Type\BotShortDescription;

trait GetMyShortDescription
{
    public function getMyShortDescription(
        ?string $languageCode = null,
    ): BotShortDescription
    {
        $params = [];

        if ($languageCode !== null) {
            $params['language_code'] = $languageCode;
        }

        $result = $this->api->call('getMyShortDescription', $params);

        return BotShortDescription::fromArray($result);
    }
}
