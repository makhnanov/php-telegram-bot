<?php

declare(strict_types=1);

namespace Makhnanov\TelegramBot\Type;

readonly class PassportElementErrorTranslationFile
{
    public function __construct(
        public string $source,
        public string $type,
        public string $fileHash,
        public string $message,
    ) {}

    public static function fromArray(array $data): self
    {
        return new self(
            source: $data['source'],
            type: $data['type'],
            fileHash: $data['file_hash'],
            message: $data['message'],
        );
    }
}
