<?php

declare(strict_types=1);

namespace Makhnanov\TelegramBot\Type;

readonly class PassportData
{
    public function __construct(
        public array $data,
        public EncryptedCredentials $credentials,
    ) {}

    public static function fromArray(array $data): self
    {
        return new self(
            data: array_map(EncryptedPassportElement::fromArray(...), $data['data']),
            credentials: EncryptedCredentials::fromArray($data['credentials']),
        );
    }
}
