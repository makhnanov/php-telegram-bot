<?php

declare(strict_types=1);

namespace Makhnanov\TelegramBot\Type;

readonly class WebAppData
{
    public function __construct(
        public string $data,
        public string $buttonText,
    ) {}

    public static function fromArray(array $data): self
    {
        return new self(
            data: $data['data'],
            buttonText: $data['button_text'],
        );
    }
}
