<?php

declare(strict_types=1);

namespace Makhnanov\TelegramBot\Type;

readonly class DirectMessagesTopic
{
    public function __construct(
        public int $topicId,
        public ?User $user = null,
    ) {}

    public static function fromArray(array $data): self
    {
        return new self(
            topicId: $data['topic_id'],
            user: isset($data['user']) ? User::fromArray($data['user']) : null,
        );
    }
}
