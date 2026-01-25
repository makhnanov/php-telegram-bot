<?php

declare(strict_types=1);

namespace Makhnanov\TelegramBot\Type;

readonly class MessageReactionUpdated
{
    public function __construct(
        public Chat $chat,
        public int $messageId,
        public int $date,
        public array $oldReaction,
        public array $newReaction,
        public ?User $user = null,
        public ?Chat $actorChat = null,
    ) {}

    public static function fromArray(array $data): self
    {
        return new self(
            chat: Chat::fromArray($data['chat']),
            messageId: $data['message_id'],
            user: isset($data['user']) ? User::fromArray($data['user']) : null,
            actorChat: isset($data['actor_chat']) ? Chat::fromArray($data['actor_chat']) : null,
            date: $data['date'],
            oldReaction: array_map(ReactionType::fromArray(...), $data['old_reaction']),
            newReaction: array_map(ReactionType::fromArray(...), $data['new_reaction']),
        );
    }
}
