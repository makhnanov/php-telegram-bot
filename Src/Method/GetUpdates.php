<?php

declare(strict_types=1);

namespace Makhnanov\TelegramBot\Method;

use Generator;
use Makhnanov\TelegramBot\Type\Update;

trait GetUpdates
{
    private int $offset = 0;

    /**
     * @return Update[]
     */
    public function getUpdates(
        ?int $offset = null,
        ?int $limit = null,
        ?int $timeout = null,
        ?array $allowedUpdates = null,
    ): array {
        $params = [];

        if ($offset !== null) {
            $params['offset'] = $offset;
        }
        if ($limit !== null) {
            $params['limit'] = $limit;
        }
        if ($timeout !== null) {
            $params['timeout'] = $timeout;
        }
        if ($allowedUpdates !== null) {
            $params['allowed_updates'] = $allowedUpdates;
        }

        $result = $this->api->call('getUpdates', $params);

        return array_map(Update::fromArray(...), $result);
    }

    /**
     * Long polling generator - yields updates infinitely
     */
    public function poll(int $timeout = 30): Generator
    {
        while (true) {
            $updates = $this->getUpdates(
                offset: $this->offset,
                timeout: $timeout,
            );

            foreach ($updates as $update) {
                $this->offset = $update->updateId + 1;
                yield $update;
            }
        }
    }
}