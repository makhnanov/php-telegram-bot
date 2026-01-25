<?php

declare(strict_types=1);

namespace Makhnanov\TelegramBot\Method;

trait GetCustomEmojiStickers
{
    public function getCustomEmojiStickers(
        array $customEmojiIds,
    ): array
    {
        $params = [];

        $params['custom_emoji_ids'] = $customEmojiIds;

        return $this->api->call('getCustomEmojiStickers', $params);
    }
}
