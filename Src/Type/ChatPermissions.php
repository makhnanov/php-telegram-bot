<?php

declare(strict_types=1);

namespace Makhnanov\TelegramBot\Type;

readonly class ChatPermissions
{
    public function __construct(
        public ?bool $canSendMessages = null,
        public ?bool $canSendAudios = null,
        public ?bool $canSendDocuments = null,
        public ?bool $canSendPhotos = null,
        public ?bool $canSendVideos = null,
        public ?bool $canSendVideoNotes = null,
        public ?bool $canSendVoiceNotes = null,
        public ?bool $canSendPolls = null,
        public ?bool $canSendOtherMessages = null,
        public ?bool $canAddWebPagePreviews = null,
        public ?bool $canChangeInfo = null,
        public ?bool $canInviteUsers = null,
        public ?bool $canPinMessages = null,
        public ?bool $canManageTopics = null,
    ) {}

    public static function fromArray(array $data): self
    {
        return new self(
            canSendMessages: $data['can_send_messages'] ?? null,
            canSendAudios: $data['can_send_audios'] ?? null,
            canSendDocuments: $data['can_send_documents'] ?? null,
            canSendPhotos: $data['can_send_photos'] ?? null,
            canSendVideos: $data['can_send_videos'] ?? null,
            canSendVideoNotes: $data['can_send_video_notes'] ?? null,
            canSendVoiceNotes: $data['can_send_voice_notes'] ?? null,
            canSendPolls: $data['can_send_polls'] ?? null,
            canSendOtherMessages: $data['can_send_other_messages'] ?? null,
            canAddWebPagePreviews: $data['can_add_web_page_previews'] ?? null,
            canChangeInfo: $data['can_change_info'] ?? null,
            canInviteUsers: $data['can_invite_users'] ?? null,
            canPinMessages: $data['can_pin_messages'] ?? null,
            canManageTopics: $data['can_manage_topics'] ?? null,
        );
    }
}
