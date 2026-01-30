<?php

declare(strict_types=1);

namespace Makhnanov\TelegramBot\Type;

trait MaybeInaccessibleMessageTrait
{
    public static function createFromArray(array $data): Message|InaccessibleMessage
    {
        if ($data['date'] === 0) {
            return InaccessibleMessage::fromArray($data);
        }

        return Message::fromArray($data);
    }
}