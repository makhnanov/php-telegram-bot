<?php

namespace Makhnanov\TelegramBot\Api\Test;

interface Debuggable
{
    public function __debugInfo(): ?array;
}