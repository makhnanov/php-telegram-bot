<?php

declare(strict_types=1);

namespace Makhnanov\TelegramBot\Method;

use Makhnanov\TelegramBot\Type\StickerSet;

trait GetStickerSet
{
    public function getStickerSet(
        string $name,
    ): StickerSet
    {
        $params = [];

        $params['name'] = $name;

        $result = $this->api->call('getStickerSet', $params);

        return StickerSet::fromArray($result);
    }
}
