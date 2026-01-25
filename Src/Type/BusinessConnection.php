<?php

declare(strict_types=1);

namespace Makhnanov\TelegramBot\Type;

readonly class BusinessConnection
{
    public function __construct(
        public string $id,
        public User $user,
        public int $userChatId,
        public int $date,
        public bool $isEnabled,
        public ?BusinessBotRights $rights = null,
    ) {}

    public static function fromArray(array $data): self
    {
        return new self(
            id: $data['id'],
            user: User::fromArray($data['user']),
            userChatId: $data['user_chat_id'],
            date: $data['date'],
            rights: isset($data['rights']) ? BusinessBotRights::fromArray($data['rights']) : null,
            isEnabled: $data['is_enabled'],
        );
    }
}
