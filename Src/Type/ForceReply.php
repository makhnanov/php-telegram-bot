<?php

declare(strict_types=1);

namespace Makhnanov\TelegramBot\Type;

readonly class ForceReply
{
    public function __construct(
        public bool $forceReply,
        public ?string $inputFieldPlaceholder = null,
        public ?bool $selective = null,
    ) {}

    public static function fromArray(array $data): self
    {
        return new self(
            forceReply: $data['force_reply'],
            inputFieldPlaceholder: $data['input_field_placeholder'] ?? null,
            selective: $data['selective'] ?? null,
        );
    }
}
