<?php
declare(strict_types=1);

namespace Makhnanov\Telegram81\Api\Method\Get;

use GuzzleHttp\Promise\Promise;
use GuzzleHttp\Psr7\Response;
use Makhnanov\Telegram81\Api\Exception\NoResultException;
use Makhnanov\Telegram81\Api\Type\User;
use Makhnanov\Telegram81\Helper\Responsive;
use Makhnanov\Telegram81\Helper\ResponsiveResultativeInterface;
use Makhnanov\Telegram81\Helper\Resultative;

use function Makhnanov\Telegram81\decoded;

trait GetMeTrait
{
    /**
     * @link https://core.telegram.org/bots/api#getme
     *
     * A simple method for testing your bot's auth token. Requires no parameters.
     * Returns basic information about the bot in form of a User object.
     */
    public function getMe(): User & ResponsiveResultativeInterface
    {
        /** @noinspection PhpIncompatibleReturnTypeInspection */
        return new class($this->getResponse(__FUNCTION__)) extends User implements ResponsiveResultativeInterface
        {

            use Responsive, Resultative;

            private array $result;

            private Response $response;

            public function __construct(Promise|Response|array $data = [])
            {
                $this->response = $data;
                $this->result = decoded($this->response)['result'] ?? throw new NoResultException();
                parent::__construct($this->result);
            }
        };
    }
}
