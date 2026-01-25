<?php

declare(strict_types=1);

namespace Makhnanov\TelegramBot\Type;

readonly class WriteAccessAllowed
{
    public function __construct(
        public ?bool $fromRequest = null,
        public ?string $webAppName = null,
        public ?bool $fromAttachmentMenu = null,
    ) {}

    public static function fromArray(array $data): self
    {
        return new self(
            fromRequest: $data['from_request'] ?? null,
            webAppName: $data['web_app_name'] ?? null,
            fromAttachmentMenu: $data['from_attachment_menu'] ?? null,
        );
    }
}
