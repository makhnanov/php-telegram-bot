<?php

declare(strict_types=1);

namespace Makhnanov\TelegramBot\Method;

use Makhnanov\TelegramBot\Type\OwnedGifts;

trait GetBusinessAccountGifts
{
    public function getBusinessAccountGifts(
        string $businessConnectionId,
        ?bool $excludeUnsaved = null,
        ?bool $excludeSaved = null,
        ?bool $excludeUnlimited = null,
        ?bool $excludeLimitedUpgradable = null,
        ?bool $excludeLimitedNonUpgradable = null,
        ?bool $excludeUnique = null,
        ?bool $excludeFromBlockchain = null,
        ?bool $sortByPrice = null,
        ?string $offset = null,
        ?int $limit = null,
    ): OwnedGifts
    {
        $params = [];

        $params['business_connection_id'] = $businessConnectionId;
        if ($excludeUnsaved !== null) {
            $params['exclude_unsaved'] = $excludeUnsaved;
        }
        if ($excludeSaved !== null) {
            $params['exclude_saved'] = $excludeSaved;
        }
        if ($excludeUnlimited !== null) {
            $params['exclude_unlimited'] = $excludeUnlimited;
        }
        if ($excludeLimitedUpgradable !== null) {
            $params['exclude_limited_upgradable'] = $excludeLimitedUpgradable;
        }
        if ($excludeLimitedNonUpgradable !== null) {
            $params['exclude_limited_non_upgradable'] = $excludeLimitedNonUpgradable;
        }
        if ($excludeUnique !== null) {
            $params['exclude_unique'] = $excludeUnique;
        }
        if ($excludeFromBlockchain !== null) {
            $params['exclude_from_blockchain'] = $excludeFromBlockchain;
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

        $result = $this->api->call('getBusinessAccountGifts', $params);

        return OwnedGifts::fromArray($result);
    }
}
