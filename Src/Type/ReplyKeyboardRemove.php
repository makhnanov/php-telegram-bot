<?php

declare(strict_types=1);

namespace Makhnanov\TelegramBot\Type;

readonly class ReplyKeyboardRemove
{
    public function __construct(
        public bool $removeKeyboard,
        public ?bool $selective = null,
    ) {}

    public static function fromArray(array $data): self
    {
        return new self(
            removeKeyboard: $data['remove_keyboard'],
            selective: $data['selective'] ?? null,
        );
    }
}
