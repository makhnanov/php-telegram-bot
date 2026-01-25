<?php

declare(strict_types=1);

namespace Makhnanov\TelegramBot\Type;

readonly class EncryptedPassportElement
{
    public function __construct(
        public string $type,
        public string $hash,
        public ?string $data = null,
        public ?string $phoneNumber = null,
        public ?string $email = null,
        public ?array $files = null,
        public ?PassportFile $frontSide = null,
        public ?PassportFile $reverseSide = null,
        public ?PassportFile $selfie = null,
        public ?array $translation = null,
    ) {}

    public static function fromArray(array $data): self
    {
        return new self(
            type: $data['type'],
            data: $data['data'] ?? null,
            phoneNumber: $data['phone_number'] ?? null,
            email: $data['email'] ?? null,
            files: isset($data['files']) ? array_map(PassportFile::fromArray(...), $data['files']) : null,
            frontSide: isset($data['front_side']) ? PassportFile::fromArray($data['front_side']) : null,
            reverseSide: isset($data['reverse_side']) ? PassportFile::fromArray($data['reverse_side']) : null,
            selfie: isset($data['selfie']) ? PassportFile::fromArray($data['selfie']) : null,
            translation: isset($data['translation']) ? array_map(PassportFile::fromArray(...), $data['translation']) : null,
            hash: $data['hash'],
        );
    }
}
