<?php

declare(strict_types=1);

namespace Makhnanov\TelegramBot\Method;

trait TransferGift
{
    public function transferGift(
        string $businessConnectionId,
        string $ownedGiftId,
        int $newOwnerChatId,
        ?int $starCount = null,
    ): bool
    {
        $params = [];

        $params['business_connection_id'] = $businessConnectionId;
        $params['owned_gift_id'] = $ownedGiftId;
        $params['new_owner_chat_id'] = $newOwnerChatId;
        if ($starCount !== null) {
            $params['star_count'] = $starCount;
        }

        return $this->api->call('transferGift', $params);
    }
}
