<?php

declare(strict_types=1);

namespace Makhnanov\TelegramBot\Type;

readonly class User
{
    public function __construct(
        public int $id,
        public bool $isBot,
        public string $firstName,
        public ?string $lastName = null,
        public ?string $username = null,
        public ?string $languageCode = null,
        public ?bool $isPremium = null,
        public ?bool $addedToAttachmentMenu = null,
        public ?bool $canJoinGroups = null,
        public ?bool $canReadAllGroupMessages = null,
        public ?bool $supportsInlineQueries = null,
        public ?bool $canConnectToBusiness = null,
        public ?bool $hasMainWebApp = null,
        public ?bool $hasTopicsEnabled = null,
    ) {}

    public static function fromArray(array $data): self
    {
        return new self(
            id: $data['id'],
            isBot: $data['is_bot'],
            firstName: $data['first_name'],
            lastName: $data['last_name'] ?? null,
            username: $data['username'] ?? null,
            languageCode: $data['language_code'] ?? null,
            isPremium: $data['is_premium'] ?? null,
            addedToAttachmentMenu: $data['added_to_attachment_menu'] ?? null,
            canJoinGroups: $data['can_join_groups'] ?? null,
            canReadAllGroupMessages: $data['can_read_all_group_messages'] ?? null,
            supportsInlineQueries: $data['supports_inline_queries'] ?? null,
            canConnectToBusiness: $data['can_connect_to_business'] ?? null,
            hasMainWebApp: $data['has_main_web_app'] ?? null,
            hasTopicsEnabled: $data['has_topics_enabled'] ?? null,
        );
    }
}
