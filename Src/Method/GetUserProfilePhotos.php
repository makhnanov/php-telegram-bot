<?php

declare(strict_types=1);

namespace Makhnanov\TelegramBot\Method;

use Makhnanov\TelegramBot\Type\UserProfilePhotos;

trait GetUserProfilePhotos
{
    public function getUserProfilePhotos(
        int $userId,
        ?int $offset = null,
        ?int $limit = null,
    ): UserProfilePhotos
    {
        $params = [];

        $params['user_id'] = $userId;
        if ($offset !== null) {
            $params['offset'] = $offset;
        }
        if ($limit !== null) {
            $params['limit'] = $limit;
        }

        $result = $this->api->call('getUserProfilePhotos', $params);

        return UserProfilePhotos::fromArray($result);
    }
}
