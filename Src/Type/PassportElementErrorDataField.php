<?php

declare(strict_types=1);

namespace Makhnanov\TelegramBot\Type;

readonly class PassportElementErrorDataField
{
    public function __construct(
        public string $source,
        public string $type,
        public string $fieldName,
        public string $dataHash,
        public string $message,
    ) {}

    public static function fromArray(array $data): self
    {
        return new self(
            source: $data['source'],
            type: $data['type'],
            fieldName: $data['field_name'],
            dataHash: $data['data_hash'],
            message: $data['message'],
        );
    }
}
