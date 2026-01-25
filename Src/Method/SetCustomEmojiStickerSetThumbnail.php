<?php

declare(strict_types=1);

namespace Makhnanov\TelegramBot\Method;

trait SetCustomEmojiStickerSetThumbnail
{
    public function setCustomEmojiStickerSetThumbnail(
        string $name,
        ?string $customEmojiId = null,
    ): bool
    {
        $params = [];

        $params['name'] = $name;
        if ($customEmojiId !== null) {
            $params['custom_emoji_id'] = $customEmojiId;
        }

        return $this->api->call('setCustomEmojiStickerSetThumbnail', $params);
    }
}
