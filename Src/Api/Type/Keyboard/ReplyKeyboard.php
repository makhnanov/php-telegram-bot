<?php

namespace Makhnanov\TelegramBot\Api\Type\Keyboard;

use Makhnanov\TelegramBot\Helper\Informative;

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
