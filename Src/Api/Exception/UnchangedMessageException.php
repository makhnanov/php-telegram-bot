<?php

namespace Makhnanov\TelegramBot\Api\Exception;

use Exception;
use GuzzleHttp\Exception\BadResponseException;
use Throwable;

use function Makhnanov\TelegramBot\decoded;

class UnchangedMessageException extends Exception
{
    public const REASONS = [
        self::REASON_1,
        self::REASON_2,
    ];

    public const REASON_1 = 'Bad Request: message is not modified: specified new message '
    . 'content and reply markup are exactly the same as a current content and reply markup of the message';

    public const REASON_2 = 'Bad Request: message is not modified: specified new message content and reply '
    .'markup are exactly the same as a current content and reply markup of the message';

    public function __construct($message, $code = 0, Throwable $previous = null)
    {
        parent::__construct($message, $code, $previous);
    }

    /**
     * @throws UnchangedMessageException
     */
    public static function process(BadResponseException $e): void
    {
        $guzzleResponse = $e->getResponse();
        $decoded = decoded($guzzleResponse);
        if (
            isset($decoded['ok'], $decoded['error_code'], $decoded['description'])
            && $guzzleResponse->getStatusCode() === 400
            && $decoded['ok'] === false
            && $decoded['error_code'] === 400
            && in_array($decoded['description'], static::REASONS, true)
        ) {
            throw new static($decoded['description']);
        }
    }
}
