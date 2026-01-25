<?php

declare(strict_types=1);

namespace Makhnanov\TelegramBot\Method;

trait SetStickerMaskPosition
{
    public function setStickerMaskPosition(
        string $sticker,
        ?MaskPosition $maskPosition = null,
    ): bool
    {
        $params = [];

        $params['sticker'] = $sticker;
        if ($maskPosition !== null) {
            $params['mask_position'] = $maskPosition;
        }

        return $this->api->call('setStickerMaskPosition', $params);
    }
}
