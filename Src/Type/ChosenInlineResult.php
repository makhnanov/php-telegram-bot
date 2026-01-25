<?php

declare(strict_types=1);

namespace Makhnanov\TelegramBot\Type;

readonly class ChosenInlineResult
{
    public function __construct(
        public string $resultId,
        public User $from,
        public string $query,
        public ?Location $location = null,
        public ?string $inlineMessageId = null,
    ) {}

    public static function fromArray(array $data): self
    {
        return new self(
            resultId: $data['result_id'],
            from: User::fromArray($data['from']),
            location: isset($data['location']) ? Location::fromArray($data['location']) : null,
            inlineMessageId: $data['inline_message_id'] ?? null,
            query: $data['query'],
        );
    }
}
