<?php

declare(strict_types=1);

namespace Makhnanov\TelegramBot\Method;

trait RefundStarPayment
{
    public function refundStarPayment(
        int $userId,
        string $telegramPaymentChargeId,
    ): bool
    {
        $params = [];

        $params['user_id'] = $userId;
        $params['telegram_payment_charge_id'] = $telegramPaymentChargeId;

        return $this->api->call('refundStarPayment', $params);
    }
}
