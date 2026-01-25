<?php

declare(strict_types=1);

namespace Makhnanov\TelegramBot\Type;

readonly class EncryptedCredentials
{
    public function __construct(
        public string $data,
        public string $hash,
        public string $secret,
    ) {}

    public static function fromArray(array $data): self
    {
        return new self(
            data: $data['data'],
            hash: $data['hash'],
            secret: $data['secret'],
        );
    }
}
