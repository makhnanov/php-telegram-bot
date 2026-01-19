<?php

namespace Makhnanov\TelegramBot\Helper;

use GuzzleHttp\Psr7\Response;

trait Responsive
{
    function getResponse(): Response
    {
        /** @noinspection PhpUndefinedFieldInspection */
        return $this->response;
    }
}
