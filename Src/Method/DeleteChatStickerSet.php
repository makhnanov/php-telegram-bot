<?php

declare(strict_types=1);

namespace Makhnanov\TelegramBot\Method;

trait DeleteChatStickerSet
{
    public function deleteChatStickerSet(
        int|string $chatId,
    ): bool
    {
        $params = [];

        $params['chat_id'] = $chatId;

        return $this->api->call('deleteChatStickerSet', $params);
    }
}
