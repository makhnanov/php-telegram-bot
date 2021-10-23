<?php

namespace Makhnanov\Telegram81;

use GuzzleHttp\Psr7\Response;
use GuzzleHttp\Utils;

function is_set(mixed $value): bool
{
    return isset($value);
}

function decoded(Response $response): array
{
    return Utils::jsonDecode($response->getBody()->getContents(), true);
}
