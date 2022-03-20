<?php

declare(strict_types=1);

namespace Makhnanov\Telegram81\Api\Method;

use GuzzleHttp\Promise\Promise;
use GuzzleHttp\Psr7\Response;
use InvalidArgumentException;
use Makhnanov\Telegram81\Api\Exception\NoResultException;
use Makhnanov\Telegram81\Api\Type\UpdateCollection;
use Makhnanov\Telegram81\Helper\ResponsiveResultativeInterface;
use Makhnanov\Telegram81\Helper\ResponsiveResultativeTrait;

use function Makhnanov\Telegram81\decoded;

class GetUpdatesResponse extends UpdateCollection implements ResponsiveResultativeInterface
{
    use ResponsiveResultativeTrait;

    private array $result;

    private array|Response|Promise $response;

    /**
     * @throws NoResultException
     */
    public function __construct(array|Response|Promise $data = [])
    {
        $this->response = $data;
        $this->result = match (true) {
            is_array($this->response) => $this->response,
            $this->response instanceof Response
                => decoded($this->response)['result'] ?? throw new NoResultException(),
            $this->response instanceof Promise
                => throw new InvalidArgumentException('Feature not released. WIP. ToDo.'),
        };
        parent::__construct($this->result);
    }
}
