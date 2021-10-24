<?php

namespace Makhnanov\Telegram81\Test;

use Makhnanov\Telegram81\Api\Type\Chat;
use Makhnanov\Telegram81\Helper\Snippet;

use function Makhnanov\Telegram81\isPrivate;

class EditMessageTest extends ParentTestCase
{
    public function testBasicEditPrivate()
    {
        $joystick = Snippet::inlneJoystick();
        $send = $this->bot->sendMessage(
            $this->getPrivateTestUserId(),
            'First',
            disable_notification: true,
            reply_markup: $joystick
        );
        $e = $this->bot->editMessageText(
            'Second',
            $send->chat->id,
            $send->message_id,
            reply_markup: $send->reply_markup
        );
        $this->assertGuzzleClient($e);
        $this->aboveZero($e->message_id);
        $this->assertClassWithFields($e->chat, Chat::class, function (Chat $chat) {
            $this->aboveZero($chat->id);
            $this->trueString($chat->first_name);
            $this->trueString($chat->last_name);
            $this->trueString($chat->username);
            $this->assertTrue(isPrivate($chat));
        });
        $this->aboveZero($e->date);
        $this->aboveZero($e->edit_date);
        $this->assertSame('Second', $e->text);
        $this->assertSame($joystick, $e->reply_markup);
        /**
         * todo assert fields
         */
    }
}
