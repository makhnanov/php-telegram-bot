<?php

declare(strict_types=1);

namespace Makhnanov\TelegramBot\Method;

trait DeleteStory
{
    public function deleteStory(
        string $businessConnectionId,
        int $storyId,
    ): bool
    {
        $params = [];

        $params['business_connection_id'] = $businessConnectionId;
        $params['story_id'] = $storyId;

        return $this->api->call('deleteStory', $params);
    }
}
