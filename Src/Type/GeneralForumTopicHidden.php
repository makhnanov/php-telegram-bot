<?php

declare(strict_types=1);

namespace Makhnanov\TelegramBot\Type;

readonly class GeneralForumTopicHidden
{
    public function __construct(
        public int $userId,
        public ?string $firstName = null,
        public ?string $lastName = null,
        public ?string $username = null,
        public ?array $photo = null,
    ) {}

    public static function fromArray(array $data): self
    {
        return new self(
            userId: $data['user_id'],
            firstName: $data['first_name'] ?? null,
            lastName: $data['last_name'] ?? null,
            username: $data['username'] ?? null,
            photo: isset($data['photo']) ? array_map(PhotoSize::fromArray(...), $data['photo']) : null,
        );
    }
}
