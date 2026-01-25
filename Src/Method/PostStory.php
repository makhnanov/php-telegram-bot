<?php

declare(strict_types=1);

namespace Makhnanov\TelegramBot\Method;

use Makhnanov\TelegramBot\Type\Story;

trait PostStory
{
    public function postStory(
        string $businessConnectionId,
        InputStoryContent $content,
        int $activePeriod,
        ?string $caption = null,
        ?string $parseMode = null,
        ?array $captionEntities = null,
        ?array $areas = null,
        ?bool $postToChatPage = null,
        ?bool $protectContent = null,
    ): Story
    {
        $params = [];

        $params['business_connection_id'] = $businessConnectionId;
        $params['content'] = $content;
        $params['active_period'] = $activePeriod;
        if ($caption !== null) {
            $params['caption'] = $caption;
        }
        if ($parseMode !== null) {
            $params['parse_mode'] = $parseMode;
        }
        if ($captionEntities !== null) {
            $params['caption_entities'] = $captionEntities;
        }
        if ($areas !== null) {
            $params['areas'] = $areas;
        }
        if ($postToChatPage !== null) {
            $params['post_to_chat_page'] = $postToChatPage;
        }
        if ($protectContent !== null) {
            $params['protect_content'] = $protectContent;
        }

        $result = $this->api->call('postStory', $params);

        return Story::fromArray($result);
    }
}
