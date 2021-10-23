<?php

namespace Makhnanov\Telegram81\Helper;

use GuzzleHttp\Psr7\Response;

trait Responsive
{
    function getResponse(): Response
    {
        return $this->response;
    }

    function getResult(): array
    {
        return $this->result;
    }
}
