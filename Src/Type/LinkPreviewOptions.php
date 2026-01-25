<?php

declare(strict_types=1);

namespace Makhnanov\TelegramBot\Type;

readonly class LinkPreviewOptions
{
    public function __construct(
        public ?bool $isDisabled = null,
        public ?string $url = null,
        public ?bool $preferSmallMedia = null,
        public ?bool $preferLargeMedia = null,
        public ?bool $showAboveText = null,
    ) {}

    public static function fromArray(array $data): self
    {
        return new self(
            isDisabled: $data['is_disabled'] ?? null,
            url: $data['url'] ?? null,
            preferSmallMedia: $data['prefer_small_media'] ?? null,
            preferLargeMedia: $data['prefer_large_media'] ?? null,
            showAboveText: $data['show_above_text'] ?? null,
        );
    }
}
