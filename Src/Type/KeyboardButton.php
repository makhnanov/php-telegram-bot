<?php

declare(strict_types=1);

namespace Makhnanov\TelegramBot\Type;

readonly class KeyboardButton
{
    public function __construct(
        public ?string $text = null,
        public ?KeyboardButtonRequestUsers $requestUsers = null,
        public ?KeyboardButtonRequestChat $requestChat = null,
        public ?bool $requestContact = null,
        public ?bool $requestLocation = null,
        public ?KeyboardButtonPollType $requestPoll = null,
        public ?WebAppInfo $webApp = null,
    ) {}

    public static function fromArray(array $data): self
    {
        return new self(
            text: $data['text'] ?? null,
            requestUsers: isset($data['request_users']) ? KeyboardButtonRequestUsers::fromArray($data['request_users']) : null,
            requestChat: isset($data['request_chat']) ? KeyboardButtonRequestChat::fromArray($data['request_chat']) : null,
            requestContact: $data['request_contact'] ?? null,
            requestLocation: $data['request_location'] ?? null,
            requestPoll: isset($data['request_poll']) ? KeyboardButtonPollType::fromArray($data['request_poll']) : null,
            webApp: isset($data['web_app']) ? WebAppInfo::fromArray($data['web_app']) : null,
        );
    }
}
