<?php

declare(strict_types=1);

namespace Makhnanov\TelegramBot\Type;

readonly class ChecklistTasksDone
{
    public function __construct(
        public ?Message $checklistMessage = null,
        public ?array $markedAsDoneTaskIds = null,
        public ?array $markedAsNotDoneTaskIds = null,
    ) {}

    public static function fromArray(array $data): self
    {
        return new self(
            checklistMessage: isset($data['checklist_message']) ? Message::fromArray($data['checklist_message']) : null,
            markedAsDoneTaskIds: $data['marked_as_done_task_ids'] ?? null,
            markedAsNotDoneTaskIds: $data['marked_as_not_done_task_ids'] ?? null,
        );
    }
}
