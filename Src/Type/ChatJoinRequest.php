<?php

declare(strict_types=1);

namespace Makhnanov\TelegramBot\Type;

readonly class ChatJoinRequest
{
    public function __construct(
        public Chat $chat,
        public User $from,
        public int $userChatId,
        public int $date,
        public ?string $bio = null,
        public ?ChatInviteLink $inviteLink = null,
    ) {}

    public static function fromArray(array $data): self
    {
        return new self(
            chat: Chat::fromArray($data['chat']),
            from: User::fromArray($data['from']),
            userChatId: $data['user_chat_id'],
            date: $data['date'],
            bio: $data['bio'] ?? null,
            inviteLink: isset($data['invite_link']) ? ChatInviteLink::fromArray($data['invite_link']) : null,
        );
    }
}
