<?php /** @noinspection SpellCheckingInspection */

namespace Makhnanov\Telegram81\Helper;

trait Resultative
{
    function getResult(): array
    {
        /** @noinspection PhpUndefinedFieldInspection */
        return $this->result;
    }
}
