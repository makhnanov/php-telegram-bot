<?php

namespace Makhnanov\Telegram81\Api\Test;

interface Debuggable
{
    public function __debugInfo(): ?array;
}