<?php

declare(strict_types=1);

namespace Makhnanov\TelegramBot\Type;

readonly class Poll
{
    public function __construct(
        public string $id,
        public string $question,
        public array $options,
        public int $totalVoterCount,
        public bool $isClosed,
        public bool $isAnonymous,
        public string $type,
        public bool $allowsMultipleAnswers,
        public ?array $questionEntities = null,
        public ?int $correctOptionId = null,
        public ?string $explanation = null,
        public ?array $explanationEntities = null,
        public ?int $openPeriod = null,
        public ?int $closeDate = null,
    ) {}

    public static function fromArray(array $data): self
    {
        return new self(
            id: $data['id'],
            question: $data['question'],
            questionEntities: isset($data['question_entities']) ? array_map(MessageEntity::fromArray(...), $data['question_entities']) : null,
            options: array_map(PollOption::fromArray(...), $data['options']),
            totalVoterCount: $data['total_voter_count'],
            isClosed: $data['is_closed'],
            isAnonymous: $data['is_anonymous'],
            type: $data['type'],
            allowsMultipleAnswers: $data['allows_multiple_answers'],
            correctOptionId: $data['correct_option_id'] ?? null,
            explanation: $data['explanation'] ?? null,
            explanationEntities: isset($data['explanation_entities']) ? array_map(MessageEntity::fromArray(...), $data['explanation_entities']) : null,
            openPeriod: $data['open_period'] ?? null,
            closeDate: $data['close_date'] ?? null,
        );
    }
}
