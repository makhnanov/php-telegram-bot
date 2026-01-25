<?php

declare(strict_types=1);

namespace Makhnanov\TelegramBot\Type;

readonly class Contact
{
    public function __construct(
        public string $phoneNumber,
        public string $firstName,
        public ?string $lastName = null,
        public ?int $userId = null,
        public ?string $vcard = null,
    ) {}

    public static function fromArray(array $data): self
    {
        return new self(
            phoneNumber: $data['phone_number'],
            firstName: $data['first_name'],
            lastName: $data['last_name'] ?? null,
            userId: $data['user_id'] ?? null,
            vcard: $data['vcard'] ?? null,
        );
    }
}
