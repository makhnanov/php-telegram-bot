<?php

namespace Makhnanov\Telegram81\Api\Type;

use GuzzleHttp\Promise\Promise;
use GuzzleHttp\Psr7\Response;
use Iterator;
use Makhnanov\Telegram81\Helper\Resultative;
use Makhnanov\Telegram81\Helper\ResultativeInterface;

class UpdateCollection implements Iterator
{
    private int $position = 0;

    private array $updates = [];

    private int $lastUpdateId;

    public function __construct(array $updatesArray = [])
    {
        foreach ($updatesArray as $oneUpdate) {
            $this->updates[] = new class($oneUpdate) extends Update implements ResultativeInterface
            {
                use Resultative;

                private array $result;

                public function __construct(Promise|Response|array $data = [])
                {
                    if (is_array($data)) {
                        $this->result = $data;
                    }
                    parent::__construct($data);
                }
            };
        }
        $this->lastUpdateId = $this->updates[count($this->updates) - 1]?->update_id ?? 0;
    }

    public function current(): Update & ResultativeInterface
    {
        return $this->updates[$this->position];
    }

    public function get(int $index): Update & ResultativeInterface
    {
        return $this->updates[$index];
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
