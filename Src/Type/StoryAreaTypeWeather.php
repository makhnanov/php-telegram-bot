<?php

declare(strict_types=1);

namespace Makhnanov\TelegramBot\Type;

readonly class StoryAreaTypeWeather
{
    public function __construct(
        public string $type,
        public float $temperature,
        public string $emoji,
        public int $backgroundColor,
    ) {}

    public static function fromArray(array $data): self
    {
        return new self(
            type: $data['type'],
            temperature: $data['temperature'],
            emoji: $data['emoji'],
            backgroundColor: $data['background_color'],
        );
    }
}
