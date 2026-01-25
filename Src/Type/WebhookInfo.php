<?php

declare(strict_types=1);

namespace Makhnanov\TelegramBot\Type;

readonly class WebhookInfo
{
    public function __construct(
        public string $url,
        public bool $hasCustomCertificate,
        public int $pendingUpdateCount,
        public ?string $ipAddress = null,
        public ?int $lastErrorDate = null,
        public ?string $lastErrorMessage = null,
        public ?int $lastSynchronizationErrorDate = null,
        public ?int $maxConnections = null,
        public ?array $allowedUpdates = null,
    ) {}

    public static function fromArray(array $data): self
    {
        return new self(
            url: $data['url'],
            hasCustomCertificate: $data['has_custom_certificate'],
            pendingUpdateCount: $data['pending_update_count'],
            ipAddress: $data['ip_address'] ?? null,
            lastErrorDate: $data['last_error_date'] ?? null,
            lastErrorMessage: $data['last_error_message'] ?? null,
            lastSynchronizationErrorDate: $data['last_synchronization_error_date'] ?? null,
            maxConnections: $data['max_connections'] ?? null,
            allowedUpdates: $data['allowed_updates'] ?? null,
        );
    }
}
