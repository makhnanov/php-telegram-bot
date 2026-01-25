<?php

declare(strict_types=1);

namespace Makhnanov\TelegramBot\Method;

trait EditForumTopic
{
    public function editForumTopic(
        int|string $chatId,
        int $messageThreadId,
        ?string $name = null,
        ?string $iconCustomEmojiId = null,
    ): bool
    {
        $params = [];

        $params['chat_id'] = $chatId;
        $params['message_thread_id'] = $messageThreadId;
        if ($name !== null) {
            $params['name'] = $name;
        }
        if ($iconCustomEmojiId !== null) {
            $params['icon_custom_emoji_id'] = $iconCustomEmojiId;
        }

        return $this->api->call('editForumTopic', $params);
    }
}
