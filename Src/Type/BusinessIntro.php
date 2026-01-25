<?php

declare(strict_types=1);

namespace Makhnanov\TelegramBot\Type;

readonly class BusinessIntro
{
    public function __construct(
        public ?string $title = null,
        public ?string $message = null,
        public ?Sticker $sticker = null,
    ) {}

    public static function fromArray(array $data): self
    {
        return new self(
            title: $data['title'] ?? null,
            message: $data['message'] ?? null,
            sticker: isset($data['sticker']) ? Sticker::fromArray($data['sticker']) : null,
        );
    }
}
