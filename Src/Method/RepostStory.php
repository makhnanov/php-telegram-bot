<?php

declare(strict_types=1);

namespace Makhnanov\TelegramBot\Method;

trait RepostStory
{
    public function repostStory(
        string $businessConnectionId,
        int $fromChatId,
        int $fromStoryId,
        int $activePeriod,
        ?bool $postToChatPage = null,
        ?bool $protectContent = null,
    ): array
    {
        $params = [];

        $params['business_connection_id'] = $businessConnectionId;
        $params['from_chat_id'] = $fromChatId;
        $params['from_story_id'] = $fromStoryId;
        $params['active_period'] = $activePeriod;
        if ($postToChatPage !== null) {
            $params['post_to_chat_page'] = $postToChatPage;
        }
        if ($protectContent !== null) {
            $params['protect_content'] = $protectContent;
        }

        return $this->api->call('repostStory', $params);
    }
}
