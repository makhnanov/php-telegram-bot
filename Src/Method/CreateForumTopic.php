<?php

declare(strict_types=1);

namespace Makhnanov\TelegramBot\Method;

use Makhnanov\TelegramBot\Type\ForumTopic;

trait CreateForumTopic
{
    public function createForumTopic(
        int|string $chatId,
        string $name,
        ?int $iconColor = null,
        ?string $iconCustomEmojiId = null,
    ): ForumTopic
    {
        $params = [];

        $params['chat_id'] = $chatId;
        $params['name'] = $name;
        if ($iconColor !== null) {
            $params['icon_color'] = $iconColor;
        }
        if ($iconCustomEmojiId !== null) {
            $params['icon_custom_emoji_id'] = $iconCustomEmojiId;
        }

        $result = $this->api->call('createForumTopic', $params);

        return ForumTopic::fromArray($result);
    }
}
