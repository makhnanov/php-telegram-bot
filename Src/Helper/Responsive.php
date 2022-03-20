<?php

declare(strict_types=1);

namespace Makhnanov\Telegram81\Helper;

use GuzzleHttp\Psr7\Response;

trait Responsive
{
    function getResponse(): Response
    {
        return $this->response;
    }
}
