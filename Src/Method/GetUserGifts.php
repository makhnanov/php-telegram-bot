<?php

declare(strict_types=1);

namespace Makhnanov\TelegramBot\Method;

use Makhnanov\TelegramBot\Type\OwnedGifts;

trait GetUserGifts
{
    public function getUserGifts(
        int $userId,
        ?bool $excludeUnlimited = null,
        ?bool $excludeLimitedUpgradable = null,
        ?bool $excludeLimitedNonUpgradable = null,
        ?bool $excludeFromBlockchain = null,
        ?bool $excludeUnique = null,
        ?bool $sortByPrice = null,
        ?string $offset = null,
        ?int $limit = null,
    ): OwnedGifts
    {
        $params = [];

        $params['user_id'] = $userId;
        if ($excludeUnlimited !== null) {
            $params['exclude_unlimited'] = $excludeUnlimited;
        }
        if ($excludeLimitedUpgradable !== null) {
            $params['exclude_limited_upgradable'] = $excludeLimitedUpgradable;
        }
        if ($excludeLimitedNonUpgradable !== null) {
            $params['exclude_limited_non_upgradable'] = $excludeLimitedNonUpgradable;
        }
        if ($excludeFromBlockchain !== null) {
            $params['exclude_from_blockchain'] = $excludeFromBlockchain;
        }
        if ($excludeUnique !== null) {
            $params['exclude_unique'] = $excludeUnique;
        }
        if ($sortByPrice !== null) {
            $params['sort_by_price'] = $sortByPrice;
        }
        if ($offset !== null) {
            $params['offset'] = $offset;
        }
        if ($limit !== null) {
            $params['limit'] = $limit;
        }

        $result = $this->api->call('getUserGifts', $params);

        return OwnedGifts::fromArray($result);
    }
}
