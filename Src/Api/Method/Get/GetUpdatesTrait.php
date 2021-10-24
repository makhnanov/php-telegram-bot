<?php

namespace Makhnanov\Telegram81\Api\Method\Get;

use GuzzleHttp\Promise\Promise;
use GuzzleHttp\Psr7\Response;
use Makhnanov\Telegram81\Api\Bot;
use Makhnanov\Telegram81\Api\Enumeration\Offset;
use Makhnanov\Telegram81\Api\Exception\BadCodeException;
use Makhnanov\Telegram81\Api\Exception\NoResultException;
use Makhnanov\Telegram81\Api\Exception\TypeError;
use Makhnanov\Telegram81\Api\Type\UpdateCollection;
use Makhnanov\Telegram81\Helper\Responsive;
use Makhnanov\Telegram81\Helper\ResponsiveInterface;
use Makhnanov\Telegram81\Helper\ResponsiveResultative;
use Makhnanov\Telegram81\Helper\ResponsiveResultativeTrait;
use Makhnanov\Telegram81\Helper\ViaArray;
use ReflectionClass;
use ReflectionNamedType;
use ReflectionUnionType;

use function Makhnanov\Telegram81\decoded;

trait GetUpdatesTrait
{
    /**
     *
     * @param int|Offset $offset @Optional. Identifier of the first update to be returned. Must be greater
     *                                      by one than the highest among the identifiers of previously received updates.
     *                                      By default, updates starting with the earliest unconfirmed update are returned.
     *                                      An update is considered confirmed as soon as getUpdates is called with an
     *                                      offset higher than its update_id.
     *                                      The negative offset can be specified to retrieve updates starting from
     *                                      -offset update from the end of the updates queue.
     *                                      All previous updates will forgotten.
     *
     * @param null|int $limit @Optional. Limits the number of updates to be retrieved.
     *                                   Values between 1-100 are accepted. Defaults to 100.
     *
     * @param int $timeout @Optional. Timeout in seconds for long polling. Defaults to 0, i.e. usual short polling.
     *                                Should be positive, short polling should be used for testing purposes only.
     *
     * @param null|string[] $allowed_updates @Optional. A JSON-serialized list of the update types you want your bot to receive.
     *                                                  For example, specify [“message”, “edited_channel_post”, “callback_query”]
     *                                                  to only receive updates of these types. See Update for a complete
     *                                                  list of available update types. Specify an empty list to receive all update
     *                                                  types except chat_member (default). If not specified, the previous setting
     *                                                  will be used. Please note that this parameter doesn't affect updates created
     *                                                  before the call to the getUpdates, so unwanted updates may be received for
     *                                                  a short period of time.
     *
     * @property ?ViaArray $viaArray
     *
     * @noinspection PhpUnusedLocalVariableInspection
     */
    public function getUpdates(
        int|Offset $offset = Offset::Auto,
        int        $limit = null,
        int        $timeout = Bot::STD_LONG_POOLING_TIMEOUT,
        array      $allowed_updates = null,
        ?ViaArray  $viaArray = null,
    ): UpdateCollection & ResponsiveResultative {
        list($parameterNames, $parameterValues) = $this->viaArray(__FUNCTION__, $viaArray);
        foreach ($parameterValues as $name => $value) {
            $$name = $value;
        }

        # ToDo: make logger
        // dump(date('[H:i:s] ') . "Get Updates $this->lastUpdateId.");

        $autoOffset = $offset === Offset::Auto;

        if ($autoOffset) {
            $offset = $this->getUpdatesOffset;
        }

        $collection = new class($this->getResponse(__FUNCTION__, compact(...$parameterNames)))
            extends UpdateCollection
            implements ResponsiveResultative
        {
            use ResponsiveResultativeTrait;

            private array $result;

            private Response $response;

            public function __construct(array|Response|Promise $data = [])
            {
                $this->response = $data;
                $this->result = decoded($this->response)['result'] ?? throw new NoResultException();
                parent::__construct($this->result);
            }
        };

        if ($autoOffset) {
            $lastReceivedUpdateId = $collection->getLastReceivedUpdateId();
            $lastReceivedUpdateId and $this->getUpdatesOffset = (int)($lastReceivedUpdateId + 1);
        }

        return $collection;
    }

    public function handleStopSignal()
    {
    }
}
