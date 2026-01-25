<?php

declare(strict_types=1);

namespace Makhnanov\TelegramBot\Method;

trait DeleteStickerSet
{
    public function deleteStickerSet(
        string $name,
    ): bool
    {
        $params = [];

        $params['name'] = $name;

        return $this->api->call('deleteStickerSet', $params);
    }
}
