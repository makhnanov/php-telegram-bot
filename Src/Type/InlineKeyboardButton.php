<?php

declare(strict_types=1);

namespace Makhnanov\TelegramBot\Type;

readonly class InlineKeyboardButton
{
    public function __construct(
        public string $text,
        public ?string $url = null,
        public ?string $callbackData = null,
        public ?WebAppInfo $webApp = null,
        public ?LoginUrl $loginUrl = null,
        public ?string $switchInlineQuery = null,
        public ?string $switchInlineQueryCurrentChat = null,
        public ?SwitchInlineQueryChosenChat $switchInlineQueryChosenChat = null,
        public ?CopyTextButton $copyText = null,
        public ?CallbackGame $callbackGame = null,
        public ?bool $pay = null,
    ) {}

    public static function fromArray(array $data): self
    {
        return new self(
            text: $data['text'],
            url: $data['url'] ?? null,
            callbackData: $data['callback_data'] ?? null,
            webApp: isset($data['web_app']) ? WebAppInfo::fromArray($data['web_app']) : null,
            loginUrl: isset($data['login_url']) ? LoginUrl::fromArray($data['login_url']) : null,
            switchInlineQuery: $data['switch_inline_query'] ?? null,
            switchInlineQueryCurrentChat: $data['switch_inline_query_current_chat'] ?? null,
            switchInlineQueryChosenChat: isset($data['switch_inline_query_chosen_chat']) ? SwitchInlineQueryChosenChat::fromArray($data['switch_inline_query_chosen_chat']) : null,
            copyText: isset($data['copy_text']) ? CopyTextButton::fromArray($data['copy_text']) : null,
            callbackGame: isset($data['callback_game']) ? CallbackGame::fromArray($data['callback_game']) : null,
            pay: $data['pay'] ?? null,
        );
    }
}
