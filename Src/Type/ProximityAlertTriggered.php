<?php

declare(strict_types=1);

namespace Makhnanov\TelegramBot\Type;

readonly class ProximityAlertTriggered
{
    public function __construct(
        public User $traveler,
        public User $watcher,
        public int $distance,
    ) {}

    public static function fromArray(array $data): self
    {
        return new self(
            traveler: User::fromArray($data['traveler']),
            watcher: User::fromArray($data['watcher']),
            distance: $data['distance'],
        );
    }
}
