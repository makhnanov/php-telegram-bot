<?php

declare(strict_types=1);

namespace Makhnanov\TelegramBot\Type;

readonly class PassportFile
{
    public function __construct(
        public string $fileId,
        public string $fileUniqueId,
        public int $fileSize,
        public int $fileDate,
    ) {}

    public static function fromArray(array $data): self
    {
        return new self(
            fileId: $data['file_id'],
            fileUniqueId: $data['file_unique_id'],
            fileSize: $data['file_size'],
            fileDate: $data['file_date'],
        );
    }
}
