<?php

declare(strict_types=1);

namespace Makhnanov\TelegramBot\Type;

readonly class InlineQueryResultsButton
{
    public function __construct(
        public string $text,
        public ?WebAppInfo $webApp = null,
        public ?string $startParameter = null,
    ) {}

    public static function fromArray(array $data): self
    {
        return new self(
            text: $data['text'],
            webApp: isset($data['web_app']) ? WebAppInfo::fromArray($data['web_app']) : null,
            startParameter: $data['start_parameter'] ?? null,
        );
    }
}
