<?php

declare(strict_types=1);

namespace Makhnanov\TelegramBot\Method;

use Makhnanov\TelegramBot\Type\Story;

trait EditStory
{
    public function editStory(
        string $businessConnectionId,
        int $storyId,
        InputStoryContent $content,
        ?string $caption = null,
        ?string $parseMode = null,
        ?array $captionEntities = null,
        ?array $areas = null,
    ): Story
    {
        $params = [];

        $params['business_connection_id'] = $businessConnectionId;
        $params['story_id'] = $storyId;
        $params['content'] = $content;
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

        $result = $this->api->call('editStory', $params);

        return Story::fromArray($result);
    }
}
