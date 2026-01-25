<?php

declare(strict_types=1);

namespace Makhnanov\TelegramBot\Method;

trait SetStickerKeywords
{
    public function setStickerKeywords(
        string $sticker,
        ?array $keywords = null,
    ): bool
    {
        $params = [];

        $params['sticker'] = $sticker;
        if ($keywords !== null) {
            $params['keywords'] = $keywords;
        }

        return $this->api->call('setStickerKeywords', $params);
    }
}
