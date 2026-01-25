<?php

declare(strict_types=1);

namespace Makhnanov\TelegramBot\Type;

readonly class PassportElementErrorTranslationFiles
{
    public function __construct(
        public string $source,
        public string $type,
        public array $fileHashes,
        public string $message,
    ) {}

    public static function fromArray(array $data): self
    {
        return new self(
            source: $data['source'],
            type: $data['type'],
            fileHashes: $data['file_hashes'],
            message: $data['message'],
        );
    }
}
