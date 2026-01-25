<?php

declare(strict_types=1);

namespace Makhnanov\TelegramBot\Type;

readonly class KeyboardButtonRequestChat
{
    public function __construct(
        public int $requestId,
        public bool $chatIsChannel,
        public ?bool $chatIsForum = null,
        public ?bool $chatHasUsername = null,
        public ?bool $chatIsCreated = null,
        public ?ChatAdministratorRights $userAdministratorRights = null,
        public ?ChatAdministratorRights $botAdministratorRights = null,
        public ?bool $botIsMember = null,
        public ?bool $requestTitle = null,
        public ?bool $requestUsername = null,
        public ?bool $requestPhoto = null,
    ) {}

    public static function fromArray(array $data): self
    {
        return new self(
            requestId: $data['request_id'],
            chatIsChannel: $data['chat_is_channel'],
            chatIsForum: $data['chat_is_forum'] ?? null,
            chatHasUsername: $data['chat_has_username'] ?? null,
            chatIsCreated: $data['chat_is_created'] ?? null,
            userAdministratorRights: isset($data['user_administrator_rights']) ? ChatAdministratorRights::fromArray($data['user_administrator_rights']) : null,
            botAdministratorRights: isset($data['bot_administrator_rights']) ? ChatAdministratorRights::fromArray($data['bot_administrator_rights']) : null,
            botIsMember: $data['bot_is_member'] ?? null,
            requestTitle: $data['request_title'] ?? null,
            requestUsername: $data['request_username'] ?? null,
            requestPhoto: $data['request_photo'] ?? null,
        );
    }
}
