<?php

declare(strict_types=1);

namespace Makhnanov\TelegramBot\Type;

readonly class InlineKeyboardMarkup
{
    public function __construct(
        public array $inlineKeyboard,
    ) {}

    public static function fromArray(array $data): self
    {
        return new self(
            inlineKeyboard: array_map(fn($row) => array_map(InlineKeyboardButton::fromArray(...), $row), $data['inline_keyboard']),
        );
    }
}
