<?php

namespace Makhnanov\Telegram81\Api\Type;

use Closure;
use Iterator;
use Makhnanov\Telegram81\Api\Bot;
use Makhnanov\Telegram81\Helper\ResultativeInterface;
use Throwable;

/**
 * @template Update
 */
class UpdateCollection implements Iterator
{
    private int $position = 0;

    /**
     * @var Update[]
     */
    private array $updates = [];

    private int $lastUpdateId;

    public function __construct(private readonly Bot $bot, array $updates = [])
    {
        foreach ($updates as $update) {
            $this->updates[] = new Update($bot, $update);
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

    public function eachSafe(
        array|Closure $closure,
        array|Closure $errHandler,
        array         $params = [],
        int|array|Closure $errDelay = 1,
    ): void {
        foreach ($this->updates as $update) {
            try {
                is_array($closure)
                    ? call_user_func_array($closure, [$this->bot, $update, ...$params])
                    : $closure($this->bot, $update, ...$params);
            } catch (Throwable $e) {
                $errHandler($e);
                $errDelay and (is_int($errDelay) ? sleep($errDelay) : $errDelay());
            }
        }
    }
}
