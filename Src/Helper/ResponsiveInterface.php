<?php

namespace Makhnanov\Telegram81\Helper;

use GuzzleHttp\Psr7\Response;

interface ResponsiveInterface
{
    function getResponse(): Response;
}
