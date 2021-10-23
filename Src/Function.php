<?php

namespace Makhnanov\Telegram81;

use GuzzleHttp\Psr7\Response;
use GuzzleHttp\Utils;
use UnitEnum;

function is_set(mixed $value): bool
{
    return isset($value);
}

function decoded(Response $response): array
{
    return Utils::jsonDecode($response->getBody()->getContents(), true);
}

function name(UnitEnum $enum): string
{
    return $enum->name;
}

function value(UnitEnum $enum): string
{
    return $enum->name;
}

function enumToArray(UnitEnum $enum): array
{
    return [$enum->name => $enum->value ?? null];
}
