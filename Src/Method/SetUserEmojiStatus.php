<?php

declare(strict_types=1);

namespace Makhnanov\TelegramBot\Method;

trait SetUserEmojiStatus
{
    public function setUserEmojiStatus(
        int $userId,
        ?string $emojiStatusCustomEmojiId = null,
        ?int $emojiStatusExpirationDate = null,
    ): bool
    {
        $params = [];

        $params['user_id'] = $userId;
        if ($emojiStatusCustomEmojiId !== null) {
            $params['emoji_status_custom_emoji_id'] = $emojiStatusCustomEmojiId;
        }
        if ($emojiStatusExpirationDate !== null) {
            $params['emoji_status_expiration_date'] = $emojiStatusExpirationDate;
        }

        return $this->api->call('setUserEmojiStatus', $params);
    }
}
