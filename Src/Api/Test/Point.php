<?php

namespace Makhnanov\TelegramBot\Api\Test;

class Point implements Debuggable
{
    public function __debugInfo(): ?array
    {
        return [];
    }

    public function __toString(): string
    {
        return 'str';
    }
}
