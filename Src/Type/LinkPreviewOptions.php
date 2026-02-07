<?php

declare(strict_types=1);

namespace Makhnanov\TelegramBot\Type;

readonly class LinkPreviewOptions implements \JsonSerializable
{
    public function __construct(
        public ?bool $isDisabled = null,
        public ?string $url = null,
        public ?bool $preferSmallMedia = null,
        public ?bool $preferLargeMedia = null,
        public ?bool $showAboveText = null,
    ) {}

    public function jsonSerialize(): array
    {
        $result = [];
        if ($this->isDisabled !== null) $result['is_disabled'] = $this->isDisabled;
        if ($this->url !== null) $result['url'] = $this->url;
        if ($this->preferSmallMedia !== null) $result['prefer_small_media'] = $this->preferSmallMedia;
        if ($this->preferLargeMedia !== null) $result['prefer_large_media'] = $this->preferLargeMedia;
        if ($this->showAboveText !== null) $result['show_above_text'] = $this->showAboveText;
        return $result;
    }

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
