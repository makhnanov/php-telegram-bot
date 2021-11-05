<?php

namespace Makhnanov\Telegram81\Test;

class DeleteMessageTest extends ParentTestCase
{
    public function testDeleteFromPrivate(): void
    {
        $r = $this->bot->sendMessage($this->getPrivateTestUserId(), 'Hello');
        sleep(3);
        $dr = $this->bot->deleteMessage($this->getPrivateTestUserId(), $r->message_id);
        $this->assertTrue($dr);
    }

    public function testErrorTooLate(): void
    {
        $r = $this->bot->sendMessage($this->getPrivateTestUserId(), 'Hello');
        $this->bot->editMessageText(
            "Hello $r->message_id",
            $this->getPrivateTestUserId(),
            $r->message_id
        );
    }
}
