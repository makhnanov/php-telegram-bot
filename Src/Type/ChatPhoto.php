<?php

declare(strict_types=1);

namespace Makhnanov\TelegramBot\Type;

readonly class ChatPhoto
{
    public function __construct(
        public string $smallFileId,
        public string $smallFileUniqueId,
        public string $bigFileId,
        public string $bigFileUniqueId,
    ) {}

    public static function fromArray(array $data): self
    {
        return new self(
            smallFileId: $data['small_file_id'],
            smallFileUniqueId: $data['small_file_unique_id'],
            bigFileId: $data['big_file_id'],
            bigFileUniqueId: $data['big_file_unique_id'],
        );
    }
}
