<?php

declare(strict_types=1);

namespace Makhnanov\TelegramBot\Method;

use Makhnanov\TelegramBot\Type\BotName;

trait GetMyName
{
    public function getMyName(
        ?string $languageCode = null,
    ): BotName
    {
        $params = [];

        if ($languageCode !== null) {
            $params['language_code'] = $languageCode;
        }

        $result = $this->api->call('getMyName', $params);

        return BotName::fromArray($result);
    }
}
