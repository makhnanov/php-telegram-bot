<?php

declare(strict_types=1);

namespace Makhnanov\TelegramBot\Type;

readonly class StoryAreaTypeSuggestedReaction
{
    public function __construct(
        public string $type,
        public ReactionType $reactionType,
        public ?bool $isDark = null,
        public ?bool $isFlipped = null,
    ) {}

    public static function fromArray(array $data): self
    {
        return new self(
            type: $data['type'],
            reactionType: ReactionType::fromArray($data['reaction_type']),
            isDark: $data['is_dark'] ?? null,
            isFlipped: $data['is_flipped'] ?? null,
        );
    }
}
