<?php

declare(strict_types=1);

namespace Makhnanov\TelegramBot\Method;

trait GiftPremiumSubscription
{
    public function giftPremiumSubscription(
        int $userId,
        int $monthCount,
        int $starCount,
        ?string $text = null,
        ?string $textParseMode = null,
        ?array $textEntities = null,
    ): bool
    {
        $params = [];

        $params['user_id'] = $userId;
        $params['month_count'] = $monthCount;
        $params['star_count'] = $starCount;
        if ($text !== null) {
            $params['text'] = $text;
        }
        if ($textParseMode !== null) {
            $params['text_parse_mode'] = $textParseMode;
        }
        if ($textEntities !== null) {
            $params['text_entities'] = $textEntities;
        }

        return $this->api->call('giftPremiumSubscription', $params);
    }
}
