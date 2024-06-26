<?php

declare(strict_types=1);

namespace Makhnanov\Telegram81\Api\Type\Helpers;

trait UpdateSugar
{
    public function isPrivateMessage(): bool
    {
        return
            $this?->message?->from->id
            && $this?->message->chat->id
            && $this->message->from->id === $this->message->chat->id;
    }
}
