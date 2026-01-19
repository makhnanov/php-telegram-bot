<?php
declare(strict_types=1);

namespace Makhnanov\TelegramBot\Api\Method\Get;

use GuzzleHttp\Promise\Promise;
use GuzzleHttp\Psr7\Response;
use Makhnanov\TelegramBot\Api\Exception\NoResultException;
use Makhnanov\TelegramBot\Api\Type\User;
use Makhnanov\TelegramBot\Helper\Responsive;
use Makhnanov\TelegramBot\Helper\ResponsiveResultativeInterface;
use Makhnanov\TelegramBot\Helper\Resultative;

use function Makhnanov\TelegramBot\decoded;

trait GetMeTrait
{
    /**
     * @link https://core.telegram.org/bots/api#getme
     *
     * A simple method for testing your bot's auth token. Requires no parameters.
     * Returns basic information about the bot in form of a User object.
     */
    public function getMe(): User|ResponsiveResultativeInterface
    {

        return new class($this->getResponse(__FUNCTION__)) extends User implements ResponsiveResultativeInterface
        {
            use Responsive, Resultative;

            private array $result;

            // ToDo: get undecoded

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
