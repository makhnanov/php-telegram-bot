<?php

declare(strict_types=1);

namespace Makhnanov\TelegramBot\Method;

trait SetStickerSetTitle
{
    public function setStickerSetTitle(
        string $name,
        string $title,
    ): bool
    {
        $params = [];

        $params['name'] = $name;
        $params['title'] = $title;

        return $this->api->call('setStickerSetTitle', $params);
    }
}
