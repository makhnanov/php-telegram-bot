<?php /** @noinspection SpellCheckingInspection */

namespace Makhnanov\TelegramBot\Helper;

trait Resultative
{
    function getResult(): array
    {
        /** @noinspection PhpUndefinedFieldInspection */
        return $this->result;
    }

    function toArray(): array
    {
        /** @noinspection PhpUndefinedFieldInspection */
        return $this->result;
    }
}
