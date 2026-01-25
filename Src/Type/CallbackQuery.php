<?php

declare(strict_types=1);

namespace Makhnanov\TelegramBot\Type;

readonly class CallbackQuery
{
    public function __construct(
        public string $id,
        public User $from,
        public string $chatInstance,
        public ?MaybeInaccessibleMessage $message = null,
        public ?string $inlineMessageId = null,
        public ?string $data = null,
        public ?string $gameShortName = null,
    ) {}

    public static function fromArray(array $data): self
    {
        return new self(
            id: $data['id'],
            from: User::fromArray($data['from']),
            message: isset($data['message']) ? MaybeInaccessibleMessage::fromArray($data['message']) : null,
            inlineMessageId: $data['inline_message_id'] ?? null,
            chatInstance: $data['chat_instance'],
            data: $data['data'] ?? null,
            gameShortName: $data['game_short_name'] ?? null,
        );
    }
}
