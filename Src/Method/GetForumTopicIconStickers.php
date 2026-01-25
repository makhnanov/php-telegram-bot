<?php

declare(strict_types=1);

namespace Makhnanov\TelegramBot\Method;

trait GetForumTopicIconStickers
{
    public function getForumTopicIconStickers(): array
    {
        $params = [];

        return $this->api->call('getForumTopicIconStickers', $params);
    }
}
