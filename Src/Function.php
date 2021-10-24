<?php

namespace Makhnanov\Telegram81;

use BackedEnum;
use GuzzleHttp\Psr7\Response;
use GuzzleHttp\Utils;
use JetBrains\PhpStorm\ArrayShape;
use JetBrains\PhpStorm\Pure;
use Makhnanov\Telegram81\Api\Type\Chat;
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

#[Pure]
function enumToKeyVal(UnitEnum $enum): array
{
    return [name($enum) => value($enum)];
}

/**
 * @param string|array|StringBackedEnum $text
 * Be care if you give Enum.
 * Enum->name will be callback_data and Enum->value will be text.
 *
 * @param ?string $data
 */
#[ArrayShape([
    'text' => "string",
    'callback_data' => "string"
])]
function callbackButton(string|array|BackedEnum $text, string|BackedEnum $data = null): array
{
    if (is_string($text) && is_null($data)) {
        $data = $text;
    } elseif (is_array($text)) {
        isset($data[0]) and is_string($data[0]) and $text = $data[0];
        isset($data[0]) and is_string($data[1]) and $data = $data[1];
    } elseif ($text instanceof BackedEnum) {
        $text = $text->value ?? $text->name;
        /** @noinspection PhpUndefinedFieldInspection */
        $data = $text->name;
    }
    if ($data instanceof BackedEnum) {
        $data = $data->value ?? $data->name;
    }
    return ['text' => $text, 'callback_data' => $data];
}

#[Pure] function isPrivate(string|Chat $mixed): bool
{
    return getChatType($mixed) === 'private';
}

#[Pure] function isChannel(string|Chat $mixed): bool
{
    return getChatType($mixed) === 'channel';
}

function getChatType(string|Chat $mixed): string
{
    return $mixed instanceof Chat ? $mixed->type : $mixed;
}
