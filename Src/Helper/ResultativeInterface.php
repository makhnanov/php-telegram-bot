<?php /** @noinspection SpellCheckingInspection */

namespace Makhnanov\TelegramBot\Helper;

interface ResultativeInterface extends ArrayableInterface
{
    function getResult(): array;
}
