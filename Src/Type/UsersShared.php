<?php

declare(strict_types=1);

namespace Makhnanov\TelegramBot\Type;

readonly class UsersShared
{
    public function __construct(
        public int $requestId,
        public array $users,
    ) {}

    public static function fromArray(array $data): self
    {
        return new self(
            requestId: $data['request_id'],
            users: array_map(SharedUser::fromArray(...), $data['users']),
        );
    }
}
