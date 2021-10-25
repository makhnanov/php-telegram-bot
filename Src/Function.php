<?php

namespace Makhnanov\Telegram81;

use BackedEnum;
use GuzzleHttp\Psr7\Response;
use GuzzleHttp\Utils;
use InvalidArgumentException;
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
    if (!$data) {
        if (is_string($text)) {
            return formatCallbackButton($text, $text);
        } elseif (is_array($text)) {
            return formatCallbackButton($text[0], $text[1]);
        } else {
            return formatCallbackButton($text->value, $text->name);
        }
    }

    if (is_array($text)) {
        throw new InvalidArgumentException();
    } elseif ($text instanceof BackedEnum) {
        $text = $text->name;
    }

    if ($data instanceof BackedEnum) {
        $data = $data->name;
    }

    return formatCallbackButton($text, $data);
}

function formatCallbackButton(string $text, string $data): array
{
    return ['text' => $text, 'callback_data' => $data];
}

#[Pure] function isPrivate(null|string|Chat $mixed): bool
{
    return getChatType($mixed) === 'private';
}

#[Pure] function isChannel(null|string|Chat $mixed): bool
{
    return getChatType($mixed) === 'channel';
}

function getChatType(null|string|Chat $mixed): string
{
    return $mixed instanceof Chat ? $mixed->type : $mixed;
}
