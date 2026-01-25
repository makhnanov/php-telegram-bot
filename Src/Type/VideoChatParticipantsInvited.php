<?php

declare(strict_types=1);

namespace Makhnanov\TelegramBot\Type;

readonly class VideoChatParticipantsInvited
{
    public function __construct(
        public array $users,
    ) {}

    public static function fromArray(array $data): self
    {
        return new self(
            users: array_map(User::fromArray(...), $data['users']),
        );
    }
}
