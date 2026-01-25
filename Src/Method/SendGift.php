<?php

declare(strict_types=1);

namespace Makhnanov\TelegramBot\Method;

trait SendGift
{
    public function sendGift(
        string $giftId,
        ?int $userId = null,
        int|string|null $chatId = null,
        ?bool $payForUpgrade = null,
        ?string $text = null,
        ?string $textParseMode = null,
        ?array $textEntities = null,
    ): bool
    {
        $params = [];

        if ($userId !== null) {
            $params['user_id'] = $userId;
        }
        if ($chatId !== null) {
            $params['chat_id'] = $chatId;
        }
        $params['gift_id'] = $giftId;
        if ($payForUpgrade !== null) {
            $params['pay_for_upgrade'] = $payForUpgrade;
        }
        if ($text !== null) {
            $params['text'] = $text;
        }
        if ($textParseMode !== null) {
            $params['text_parse_mode'] = $textParseMode;
        }
        if ($textEntities !== null) {
            $params['text_entities'] = $textEntities;
        }

        return $this->api->call('sendGift', $params);
    }
}
