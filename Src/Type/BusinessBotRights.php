<?php

declare(strict_types=1);

namespace Makhnanov\TelegramBot\Type;

readonly class BusinessBotRights
{
    public function __construct(
        public ?bool $canReply = null,
        public ?bool $canReadMessages = null,
        public ?bool $canDeleteSentMessages = null,
        public ?bool $canDeleteAllMessages = null,
        public ?bool $canEditName = null,
        public ?bool $canEditBio = null,
        public ?bool $canEditProfilePhoto = null,
        public ?bool $canEditUsername = null,
        public ?bool $canChangeGiftSettings = null,
        public ?bool $canViewGiftsAndStars = null,
        public ?bool $canConvertGiftsToStars = null,
        public ?bool $canTransferAndUpgradeGifts = null,
        public ?bool $canTransferStars = null,
        public ?bool $canManageStories = null,
    ) {}

    public static function fromArray(array $data): self
    {
        return new self(
            canReply: $data['can_reply'] ?? null,
            canReadMessages: $data['can_read_messages'] ?? null,
            canDeleteSentMessages: $data['can_delete_sent_messages'] ?? null,
            canDeleteAllMessages: $data['can_delete_all_messages'] ?? null,
            canEditName: $data['can_edit_name'] ?? null,
            canEditBio: $data['can_edit_bio'] ?? null,
            canEditProfilePhoto: $data['can_edit_profile_photo'] ?? null,
            canEditUsername: $data['can_edit_username'] ?? null,
            canChangeGiftSettings: $data['can_change_gift_settings'] ?? null,
            canViewGiftsAndStars: $data['can_view_gifts_and_stars'] ?? null,
            canConvertGiftsToStars: $data['can_convert_gifts_to_stars'] ?? null,
            canTransferAndUpgradeGifts: $data['can_transfer_and_upgrade_gifts'] ?? null,
            canTransferStars: $data['can_transfer_stars'] ?? null,
            canManageStories: $data['can_manage_stories'] ?? null,
        );
    }
}
