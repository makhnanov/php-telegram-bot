<?php

namespace Makhnanov\Telegram81\Api\Test;

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
