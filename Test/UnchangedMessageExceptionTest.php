<?php

namespace Makhnanov\TelegramBot\Test;

use Makhnanov\TelegramBot\Api\Exception\UnchangedMessageException;

class UnchangedMessageExceptionTest extends ParentTestCase
{
    public function testUnchangedMessage()
    {
        $this->expectException(UnchangedMessageException::class);
        $s = $this->bot->sendMessage($this->getPrivateTestUserId(), 'text');
        $chatId = $s->chat->id;
        $messageId = $s->message_id;
        $this->bot->editMessageText('text', $chatId, $messageId);
    }
}
