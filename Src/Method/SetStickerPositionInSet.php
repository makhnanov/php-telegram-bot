<?php

declare(strict_types=1);

namespace Makhnanov\TelegramBot\Method;

trait SetStickerPositionInSet
{
    public function setStickerPositionInSet(
        string $sticker,
        int $position,
    ): bool
    {
        $params = [];

        $params['sticker'] = $sticker;
        $params['position'] = $position;

        return $this->api->call('setStickerPositionInSet', $params);
    }
}
