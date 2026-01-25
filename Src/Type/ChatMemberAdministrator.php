<?php

declare(strict_types=1);

namespace Makhnanov\TelegramBot\Type;

readonly class ChatMemberAdministrator
{
    public function __construct(
        public string $status,
        public User $user,
        public bool $canBeEdited,
        public bool $isAnonymous,
        public bool $canManageChat,
        public bool $canDeleteMessages,
        public bool $canManageVideoChats,
        public bool $canRestrictMembers,
        public bool $canPromoteMembers,
        public bool $canChangeInfo,
        public bool $canInviteUsers,
        public bool $canPostStories,
        public bool $canEditStories,
        public bool $canDeleteStories,
        public ?bool $canPostMessages = null,
        public ?bool $canEditMessages = null,
        public ?bool $canPinMessages = null,
        public ?bool $canManageTopics = null,
        public ?bool $canManageDirectMessages = null,
        public ?string $customTitle = null,
    ) {}

    public static function fromArray(array $data): self
    {
        return new self(
            status: $data['status'],
            user: User::fromArray($data['user']),
            canBeEdited: $data['can_be_edited'],
            isAnonymous: $data['is_anonymous'],
            canManageChat: $data['can_manage_chat'],
            canDeleteMessages: $data['can_delete_messages'],
            canManageVideoChats: $data['can_manage_video_chats'],
            canRestrictMembers: $data['can_restrict_members'],
            canPromoteMembers: $data['can_promote_members'],
            canChangeInfo: $data['can_change_info'],
            canInviteUsers: $data['can_invite_users'],
            canPostStories: $data['can_post_stories'],
            canEditStories: $data['can_edit_stories'],
            canDeleteStories: $data['can_delete_stories'],
            canPostMessages: $data['can_post_messages'] ?? null,
            canEditMessages: $data['can_edit_messages'] ?? null,
            canPinMessages: $data['can_pin_messages'] ?? null,
            canManageTopics: $data['can_manage_topics'] ?? null,
            canManageDirectMessages: $data['can_manage_direct_messages'] ?? null,
            customTitle: $data['custom_title'] ?? null,
        );
    }
}
