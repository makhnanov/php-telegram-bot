<?php

declare(strict_types=1);

namespace Makhnanov\TelegramBot\Method;

trait DeleteStickerFromSet
{
    public function deleteStickerFromSet(
        string $sticker,
    ): bool
    {
        $params = [];

        $params['sticker'] = $sticker;

        return $this->api->call('deleteStickerFromSet', $params);
    }
}
