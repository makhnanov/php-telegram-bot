<?php

declare(strict_types=1);

namespace Makhnanov\TelegramBot\Type;

readonly class ChecklistTasksAdded
{
    public function __construct(
        public array $tasks,
        public ?Message $checklistMessage = null,
    ) {}

    public static function fromArray(array $data): self
    {
        return new self(
            checklistMessage: isset($data['checklist_message']) ? Message::fromArray($data['checklist_message']) : null,
            tasks: array_map(ChecklistTask::fromArray(...), $data['tasks']),
        );
    }
}
