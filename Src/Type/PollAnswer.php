<?php

declare(strict_types=1);

namespace Makhnanov\TelegramBot\Type;

readonly class PollAnswer
{
    public function __construct(
        public string $pollId,
        public array $optionIds,
        public ?Chat $voterChat = null,
        public ?User $user = null,
    ) {}

    public static function fromArray(array $data): self
    {
        return new self(
            pollId: $data['poll_id'],
            voterChat: isset($data['voter_chat']) ? Chat::fromArray($data['voter_chat']) : null,
            user: isset($data['user']) ? User::fromArray($data['user']) : null,
            optionIds: $data['option_ids'],
        );
    }
}
