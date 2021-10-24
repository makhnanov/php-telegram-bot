<?php

namespace Makhnanov\Telegram81\Test;

use Makhnanov\Telegram81\Helper\Snippet;

class EditMessageTest extends ParentTestCase
{
    public function testBasicEditPrivate()
    {
        $send = $this->bot->sendMessage(
            $this->getPrivateTestUserId(),
            'First',
            disable_notification: true,
            reply_markup: Snippet::inlneJoystick()
        );
        sleep(5);
        $edit = $this->bot->editMessageText(
            'Second',
            $send->chat->id,
            $send->message_id,
            reply_markup: $send->reply_markup
        );
        dd($edit->getResult());
    }
}
