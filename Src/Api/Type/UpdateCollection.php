<?php

namespace Makhnanov\Telegram81\Api\Type;

use Iterator;
use Makhnanov\Telegram81\Api\Type\Update;

class UpdateCollection implements Iterator
{
    private int $position = 0;

    private array $updates = [];

    private int $lastUpdateId = 0;

    public function __construct(array $updatesArray = [])
    {
        foreach ($updatesArray as $oneUpdate) {
            $this->updates[] = new Update($oneUpdate);
        }
        $this->lastUpdateId = $this->updates[count($this->updates) - 1]->update_id ?? 0;
    }

    public function current(): Update
    {
        return $this->updates[$this->position];
    }

    public function get(int $index): null|Update
    {
        return $this->updates[$index] ?? null;
    }

    public function next(): void
    {
        ++$this->position;
    }

    public function key(): int
    {
        return $this->position;
    }

    public function valid(): bool
    {
        return isset($this->updates[$this->position]);
    }

    public function rewind(): void
    {
        $this->position = 0;
    }

    public function getCount(): int
    {
        return count($this->updates);
    }

    public function getLastReceivedUpdateId(): int
    {
        return $this->lastUpdateId;
    }
}
