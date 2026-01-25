<?php

declare(strict_types=1);

namespace Makhnanov\TelegramBot\Method;

trait AddStickerToSet
{
    public function addStickerToSet(
        int $userId,
        string $name,
        InputSticker $sticker,
    ): bool
    {
        $params = [];

        $params['user_id'] = $userId;
        $params['name'] = $name;
        $params['sticker'] = $sticker;

        return $this->api->call('addStickerToSet', $params);
    }
}
