<?php

declare(strict_types=1);

namespace Makhnanov\TelegramBot\Method;

trait CreateNewStickerSet
{
    public function createNewStickerSet(
        int $userId,
        string $name,
        string $title,
        array $stickers,
        ?string $stickerType = null,
        ?bool $needsRepainting = null,
    ): bool
    {
        $params = [];

        $params['user_id'] = $userId;
        $params['name'] = $name;
        $params['title'] = $title;
        $params['stickers'] = $stickers;
        if ($stickerType !== null) {
            $params['sticker_type'] = $stickerType;
        }
        if ($needsRepainting !== null) {
            $params['needs_repainting'] = $needsRepainting;
        }

        return $this->api->call('createNewStickerSet', $params);
    }
}
