<?php

declare(strict_types=1);

namespace Makhnanov\TelegramBot\Method;

trait SetChatMenuButton
{
    public function setChatMenuButton(
        ?int $chatId = null,
        ?MenuButton $menuButton = null,
    ): bool
    {
        $params = [];

        if ($chatId !== null) {
            $params['chat_id'] = $chatId;
        }
        if ($menuButton !== null) {
            $params['menu_button'] = $menuButton;
        }

        return $this->api->call('setChatMenuButton', $params);
    }
}
