<?php

namespace Makhnanov\Telegram81\Helper;

use GuzzleHttp\Psr7\Response;

interface TelegramResponseInterface
{
    function getResponse(): Response;

    function getResult(): array;
}
