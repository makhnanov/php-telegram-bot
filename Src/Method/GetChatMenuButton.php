<?php

declare(strict_types=1);

namespace Makhnanov\TelegramBot\Method;

use Makhnanov\TelegramBot\Type\MenuButton;

trait GetChatMenuButton
{
    public function getChatMenuButton(
        ?int $chatId = null,
    ): MenuButton
    {
        $params = [];

        if ($chatId !== null) {
            $params['chat_id'] = $chatId;
        }

        $result = $this->api->call('getChatMenuButton', $params);

        return MenuButton::fromArray($result);
    }
}
