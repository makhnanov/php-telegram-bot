<?php

namespace Makhnanov\TelegramBot\Test;

use Makhnanov\TelegramBot\Snippet\KeyboardSnippet;

class EditMessageReplyMarkupTest extends ParentTestCase
{
    public function testBasicEditReplyMarkup()
    {
        $twitter = 'AgACAgIAAxkBAAIBH2F6pDfWCf_TWGIT_FXoMgfJDQHVAAKttzEb8JzZS8_LbFFHWFJ1AQADAgADeQADIQQ';
        $r = $this->bot->sendPhoto(
            $this->getPrivateTestUserId(),
            $twitter,
            'Caption',
            disable_notification: true,
            reply_markup: KeyboardSnippet::russianEnglish(),
        );
        sleep(5);
        $er = $this->bot->editMessageReplyMarkup(
            $this->getPrivateTestUserId(),
            $r->message_id,
            reply_markup: KeyboardSnippet::inlineJoystick()
        );
        $this->assertSame(KeyboardSnippet::inlineJoystick(), $er->reply_markup);
    }

    public function testMessageNotFoundException()
    {

    }
}
