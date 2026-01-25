<?php

declare(strict_types=1);

namespace Makhnanov\TelegramBot\Type;

readonly class StoryArea
{
    public function __construct(
        public StoryAreaPosition $position,
        public StoryAreaType $type,
    ) {}

    public static function fromArray(array $data): self
    {
        return new self(
            position: StoryAreaPosition::fromArray($data['position']),
            type: StoryAreaType::fromArray($data['type']),
        );
    }
}
