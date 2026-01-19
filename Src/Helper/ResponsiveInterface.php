<?php

namespace Makhnanov\TelegramBot\Helper;

use GuzzleHttp\Psr7\Response;

interface ResponsiveInterface
{
    function getResponse(): Response;
}
