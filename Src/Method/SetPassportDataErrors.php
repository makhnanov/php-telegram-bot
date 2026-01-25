<?php

declare(strict_types=1);

namespace Makhnanov\TelegramBot\Method;

trait SetPassportDataErrors
{
    public function setPassportDataErrors(
        int $userId,
        array $errors,
    ): bool
    {
        $params = [];

        $params['user_id'] = $userId;
        $params['errors'] = $errors;

        return $this->api->call('setPassportDataErrors', $params);
    }
}
