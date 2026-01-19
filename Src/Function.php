<?php

namespace Makhnanov\TelegramBot;

use BackedEnum;
use GuzzleHttp\Psr7\Response;
use GuzzleHttp\Utils;
use InvalidArgumentException;
use JetBrains\PhpStorm\ArrayShape;
use JetBrains\PhpStorm\Pure;
use Makhnanov\TelegramBot\Api\Type\Chat;
use Stringable;

function is_set(mixed $value): bool
{
    return isset($value);
}

function decoded(Response $response): array
{
    return Utils::jsonDecode($response->getBody()->getContents(), true);
}

/**
 * Alias for callbackButton
 */
#[ArrayShape(['text' => "string", 'callback_data' => "string"])]
function callback_button(string|array|BackedEnum|Stringable $text, string|BackedEnum|Stringable $data = null): array
{
    return callbackButton(...func_get_args());
}

/**
 * @param string|array|BackedEnum|Stringable $text
 * Be care if you give Enum.
 * Enum->name will be callback_data and Enum->value will be text.
 *
 * @param null|string|BackedEnum|Stringable $data
 * @return array
 */
#[ArrayShape([
    'text' => "string",
    'callback_data' => "string"
])]
function callbackButton(string|array|BackedEnum|Stringable $text, string|BackedEnum|Stringable $data = null): array
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

#[ArrayShape(['text' => "string", 'callback_data' => "string"])]
function formatCallbackButton(string|Stringable $text, string|Stringable $data): array
{
    return ['text' => (string)$text, 'callback_data' => (string)$data];
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
