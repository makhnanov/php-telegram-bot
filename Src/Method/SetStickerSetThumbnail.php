<?php

declare(strict_types=1);

namespace Makhnanov\TelegramBot\Method;

trait SetStickerSetThumbnail
{
    public function setStickerSetThumbnail(
        string $name,
        int $userId,
        string $format,
        ?string $thumbnail = null,
    ): bool
    {
        $params = [];

        $params['name'] = $name;
        $params['user_id'] = $userId;
        if ($thumbnail !== null) {
            $params['thumbnail'] = $thumbnail;
        }
        $params['format'] = $format;

        return $this->api->call('setStickerSetThumbnail', $params);
    }
}
