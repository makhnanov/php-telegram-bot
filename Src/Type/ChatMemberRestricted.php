<?php

declare(strict_types=1);

namespace Makhnanov\TelegramBot\Type;

readonly class ChatMemberRestricted
{
    public function __construct(
        public string $status,
        public User $user,
        public bool $isMember,
        public bool $canSendMessages,
        public bool $canSendAudios,
        public bool $canSendDocuments,
        public bool $canSendPhotos,
        public bool $canSendVideos,
        public bool $canSendVideoNotes,
        public bool $canSendVoiceNotes,
        public bool $canSendPolls,
        public bool $canSendOtherMessages,
        public bool $canAddWebPagePreviews,
        public bool $canChangeInfo,
        public bool $canInviteUsers,
        public bool $canPinMessages,
        public bool $canManageTopics,
        public int $untilDate,
    ) {}

    public static function fromArray(array $data): self
    {
        return new self(
            status: $data['status'],
            user: User::fromArray($data['user']),
            isMember: $data['is_member'],
            canSendMessages: $data['can_send_messages'],
            canSendAudios: $data['can_send_audios'],
            canSendDocuments: $data['can_send_documents'],
            canSendPhotos: $data['can_send_photos'],
            canSendVideos: $data['can_send_videos'],
            canSendVideoNotes: $data['can_send_video_notes'],
            canSendVoiceNotes: $data['can_send_voice_notes'],
            canSendPolls: $data['can_send_polls'],
            canSendOtherMessages: $data['can_send_other_messages'],
            canAddWebPagePreviews: $data['can_add_web_page_previews'],
            canChangeInfo: $data['can_change_info'],
            canInviteUsers: $data['can_invite_users'],
            canPinMessages: $data['can_pin_messages'],
            canManageTopics: $data['can_manage_topics'],
            untilDate: $data['until_date'],
        );
    }
}
