<?php

declare(strict_types=1);

namespace Makhnanov\TelegramBot\Method;

trait SetChatStickerSet
{
    public function setChatStickerSet(
        int|string $chatId,
        string $stickerSetName,
    ): bool
    {
        $params = [];

        $params['chat_id'] = $chatId;
        $params['sticker_set_name'] = $stickerSetName;

        return $this->api->call('setChatStickerSet', $params);
    }
}
