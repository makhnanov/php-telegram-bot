<?php

declare(strict_types=1);

namespace Makhnanov\TelegramBot\Method;

trait UpgradeGift
{
    public function upgradeGift(
        string $businessConnectionId,
        string $ownedGiftId,
        ?bool $keepOriginalDetails = null,
        ?int $starCount = null,
    ): bool
    {
        $params = [];

        $params['business_connection_id'] = $businessConnectionId;
        $params['owned_gift_id'] = $ownedGiftId;
        if ($keepOriginalDetails !== null) {
            $params['keep_original_details'] = $keepOriginalDetails;
        }
        if ($starCount !== null) {
            $params['star_count'] = $starCount;
        }

        return $this->api->call('upgradeGift', $params);
    }
}
