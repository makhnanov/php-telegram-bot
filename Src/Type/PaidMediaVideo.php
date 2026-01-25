<?php

declare(strict_types=1);

namespace Makhnanov\TelegramBot\Type;

readonly class PaidMediaVideo
{
    public function __construct(
        public string $type,
        public Video $video,
    ) {}

    public static function fromArray(array $data): self
    {
        return new self(
            type: $data['type'],
            video: Video::fromArray($data['video']),
        );
    }
}
