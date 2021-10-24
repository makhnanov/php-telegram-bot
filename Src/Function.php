<?php

namespace Makhnanov\Telegram81;

use GuzzleHttp\Psr7\Response;
use GuzzleHttp\Utils;
use JetBrains\PhpStorm\ArrayShape;
use Makhnanov\TelegramSeaBattle\ButtonText;
use StringBackedEnum;
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
    return $enum->value;
}

function enumAsKeyValueArray(UnitEnum $enum): array
{
    return [name($enum) => value($enum)];
}

#[ArrayShape([
    'text' => "string",
    'callback_data' => "string"
])]
function callbackButton(string|array|StringBackedEnum $text, string $data = null): array
{
    if (is_string($text) && is_null($data)) {
        $data = $text;
    } elseif (is_array($text)) {
        isset($data[0]) and is_string($data[0]) and $text = $data[0];
        isset($data[0]) and is_string($data[1]) and $data = $data[1];
    } else {
        $text = $text->value;
        $data = $text->name;
    }
    return ['text' => $text, 'callback_data' => $data];
}
