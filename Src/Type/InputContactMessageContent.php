<?php

declare(strict_types=1);

namespace Makhnanov\TelegramBot\Type;

readonly class InputContactMessageContent
{
    public function __construct(
        public string $phoneNumber,
        public string $firstName,
        public ?string $lastName = null,
        public ?string $vcard = null,
    ) {}

    public static function fromArray(array $data): self
    {
        return new self(
            phoneNumber: $data['phone_number'],
            firstName: $data['first_name'],
            lastName: $data['last_name'] ?? null,
            vcard: $data['vcard'] ?? null,
        );
    }
}
