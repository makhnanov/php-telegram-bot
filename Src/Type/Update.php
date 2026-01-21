<?php

declare(strict_types=1);

namespace Makhnanov\TelegramBot\Type;

readonly class Update
{
    public function __construct(
        public int $updateId,
        public ?Message $message = null,
        public ?Message $editedMessage = null,
        public ?Message $channelPost = null,
        public ?Message $editedChannelPost = null,
        public ?CallbackQuery $callbackQuery = null,
    ) {}

    public static function fromArray(array $data): self
    {
        return new self(
            updateId: $data['update_id'],
            message: isset($data['message']) ? Message::fromArray($data['message']) : null,
            editedMessage: isset($data['edited_message']) ? Message::fromArray($data['edited_message']) : null,
            channelPost: isset($data['channel_post']) ? Message::fromArray($data['channel_post']) : null,
            editedChannelPost: isset($data['edited_channel_post']) ? Message::fromArray($data['edited_channel_post']) : null,
            callbackQuery: isset($data['callback_query']) ? CallbackQuery::fromArray($data['callback_query']) : null,
        );
    }
}