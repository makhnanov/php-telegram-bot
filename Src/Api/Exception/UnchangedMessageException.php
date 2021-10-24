<?php

namespace Makhnanov\Telegram81\Api\Exception;

use Exception;
use Throwable;

class UnchangedMessageException extends Exception
{
    public const REASON = 'Bad Request: message is not modified: specified new message '
    . 'content and reply markup are exactly the same as a current content and reply markup of the message';

    public function __construct($message = self::REASON, $code = 0, Throwable $previous = null)
    {
        parent::__construct($message, $code, $previous);
    }
}
