<?php

declare(strict_types=1);

namespace Makhnanov\TelegramBot\Method;

trait ReplaceStickerInSet
{
    public function replaceStickerInSet(
        int $userId,
        string $name,
        string $oldSticker,
        InputSticker $sticker,
    ): bool
    {
        $params = [];

        $params['user_id'] = $userId;
        $params['name'] = $name;
        $params['old_sticker'] = $oldSticker;
        $params['sticker'] = $sticker;

        return $this->api->call('replaceStickerInSet', $params);
    }
}
