<?php

namespace Makhnanov\Telegram81\Api\Type;

use Closure;
use GuzzleHttp\Promise\Promise;
use GuzzleHttp\Psr7\Response;
use Iterator;
use Makhnanov\Telegram81\Api\Bot;
use Makhnanov\Telegram81\Helper\Resultative;
use Makhnanov\Telegram81\Helper\ResultativeInterface;
use Throwable;

/**
 * @template Update
 */
class UpdateCollection implements Iterator
{
    private int $position = 0;

    private array $updates = [];

    private int $lastUpdateId;

    public function __construct(private readonly Bot $bot, array $updatesArray = [])
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

    public function each(array|Closure $closure, ...$params): void
    {
        foreach ($this->updates as $update) {
            $closure($this->bot, $update, ...$params);
        }
    }

    public function eachSafe(array|Closure $closure, array $params, array|Closure $errorHandler, mixed $sleep = 1): void
    {
        foreach ($this->updates as $update) {
            try {
                is_array($closure)
                    ? call_user_func_array($closure, $params)
                    : $closure($this->bot, $update, ...$params);
            } catch (Throwable $e) {
                $errorHandler($e);
                is_int($sleep) and sleep($sleep);
            }
        }
    }
}
