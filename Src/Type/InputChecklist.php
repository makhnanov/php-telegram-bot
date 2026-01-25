<?php

declare(strict_types=1);

namespace Makhnanov\TelegramBot\Type;

readonly class InputChecklist
{
    public function __construct(
        public string $title,
        public array $tasks,
        public ?string $parseMode = null,
        public ?array $titleEntities = null,
        public ?bool $othersCanAddTasks = null,
        public ?bool $othersCanMarkTasksAsDone = null,
    ) {}

    public static function fromArray(array $data): self
    {
        return new self(
            title: $data['title'],
            parseMode: $data['parse_mode'] ?? null,
            titleEntities: isset($data['title_entities']) ? array_map(MessageEntity::fromArray(...), $data['title_entities']) : null,
            tasks: array_map(InputChecklistTask::fromArray(...), $data['tasks']),
            othersCanAddTasks: $data['others_can_add_tasks'] ?? null,
            othersCanMarkTasksAsDone: $data['others_can_mark_tasks_as_done'] ?? null,
        );
    }
}
