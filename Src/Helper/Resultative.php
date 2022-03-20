<?php /** @noinspection SpellCheckingInspection */

declare(strict_types=1);

namespace Makhnanov\Telegram81\Helper;

trait Resultative
{
    function getResult(): array
    {
        return $this->result;
    }

    function toArray(): array
    {
        return $this->result;
    }
}
