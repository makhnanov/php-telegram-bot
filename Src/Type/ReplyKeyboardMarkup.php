<?php

declare(strict_types=1);

namespace Makhnanov\TelegramBot\Type;

readonly class ReplyKeyboardMarkup
{
    public function __construct(
        public array $keyboard,
        public ?bool $isPersistent = null,
        public ?bool $resizeKeyboard = null,
        public ?bool $oneTimeKeyboard = null,
        public ?string $inputFieldPlaceholder = null,
        public ?bool $selective = null,
    ) {}

    public static function fromArray(array $data): self
    {
        return new self(
            keyboard: array_map(fn($row) => array_map(KeyboardButton::fromArray(...), $row), $data['keyboard']),
            isPersistent: $data['is_persistent'] ?? null,
            resizeKeyboard: $data['resize_keyboard'] ?? null,
            oneTimeKeyboard: $data['one_time_keyboard'] ?? null,
            inputFieldPlaceholder: $data['input_field_placeholder'] ?? null,
            selective: $data['selective'] ?? null,
        );
    }
}
