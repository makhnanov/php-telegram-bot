<?php

namespace Makhnanov\Telegram81\Api\Type\Keyboard;

use Makhnanov\Telegram81\Helper\Informative;

class ReplyKeyboard
{
    use Informative;

    public array $rows = [];

    public function addRow(ReplyKeyboardRow $row): self
    {
        $this->rows[] = $row;
        return $this;
    }
}
