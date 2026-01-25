<?php

declare(strict_types=1);

namespace Makhnanov\TelegramBot\Type;

readonly class ChatMemberUpdated
{
    public function __construct(
        public Chat $chat,
        public User $from,
        public int $date,
        public ChatMember $oldChatMember,
        public ChatMember $newChatMember,
        public ?ChatInviteLink $inviteLink = null,
        public ?bool $viaJoinRequest = null,
        public ?bool $viaChatFolderInviteLink = null,
    ) {}

    public static function fromArray(array $data): self
    {
        return new self(
            chat: Chat::fromArray($data['chat']),
            from: User::fromArray($data['from']),
            date: $data['date'],
            oldChatMember: ChatMember::fromArray($data['old_chat_member']),
            newChatMember: ChatMember::fromArray($data['new_chat_member']),
            inviteLink: isset($data['invite_link']) ? ChatInviteLink::fromArray($data['invite_link']) : null,
            viaJoinRequest: $data['via_join_request'] ?? null,
            viaChatFolderInviteLink: $data['via_chat_folder_invite_link'] ?? null,
        );
    }
}
