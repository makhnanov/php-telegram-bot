<?php

declare(strict_types=1);

namespace Makhnanov\TelegramBot\Method;

trait EditUserStarSubscription
{
    public function editUserStarSubscription(
        int $userId,
        string $telegramPaymentChargeId,
        bool $isCanceled,
    ): bool
    {
        $params = [];

        $params['user_id'] = $userId;
        $params['telegram_payment_charge_id'] = $telegramPaymentChargeId;
        $params['is_canceled'] = $isCanceled;

        return $this->api->call('editUserStarSubscription', $params);
    }
}
