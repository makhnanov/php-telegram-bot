<?php

declare(strict_types=1);

namespace Makhnanov\TelegramBot\Type;

readonly class ChecklistTask
{
    public function __construct(
        public int $id,
        public string $text,
        public ?array $textEntities = null,
        public ?User $completedByUser = null,
        public ?Chat $completedByChat = null,
        public ?int $completionDate = null,
    ) {}

    public static function fromArray(array $data): self
    {
        return new self(
            id: $data['id'],
            text: $data['text'],
            textEntities: isset($data['text_entities']) ? array_map(MessageEntity::fromArray(...), $data['text_entities']) : null,
            completedByUser: isset($data['completed_by_user']) ? User::fromArray($data['completed_by_user']) : null,
            completedByChat: isset($data['completed_by_chat']) ? Chat::fromArray($data['completed_by_chat']) : null,
            completionDate: $data['completion_date'] ?? null,
        );
    }
}
