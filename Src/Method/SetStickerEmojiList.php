<?php

declare(strict_types=1);

namespace Makhnanov\TelegramBot\Method;

trait SetStickerEmojiList
{
    public function setStickerEmojiList(
        string $sticker,
        array $emojiList,
    ): bool
    {
        $params = [];

        $params['sticker'] = $sticker;
        $params['emoji_list'] = $emojiList;

        return $this->api->call('setStickerEmojiList', $params);
    }
}
