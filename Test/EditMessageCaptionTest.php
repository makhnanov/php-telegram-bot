<?php

namespace Makhnanov\Telegram81\Test;

use Makhnanov\Telegram81\Snippet\KeyboardSnippet;

use Makhnanov\Telegram81\Snippet\LanguageSnippetEnum;

use function Makhnanov\Telegram81\callbackButton;

class EditMessageCaptionTest extends ParentTestCase
{
    public function testBasicEditCaption()
    {
        $twitter = 'AgACAgIAAxkBAAIBH2F6pDfWCf_TWGIT_FXoMgfJDQHVAAKttzEb8JzZS8_LbFFHWFJ1AQADAgADeQADIQQ';
        $r = $this->bot->sendPhoto(
            $this->getPrivateTestUserId(),
            $twitter,
            'Caption before edit.',
            reply_markup: KeyboardSnippet::inlineJoystick()
        );
        sleep(3);
        $this->assertSame($r->caption, 'Caption before edit.');

        $er = $this->bot->editMessageCaption(
            $this->getPrivateTestUserId(),
            $r->message_id,
            caption: 'Caption after edit.',
            reply_markup: KeyboardSnippet::inlineJoystick(append: [
                [
                    callbackButton(LanguageSnippetEnum::ENGLISH),
                    callbackButton(LanguageSnippetEnum::RUSSIAN),
                ]
            ])
        );
        $this->assertSame($er->caption, 'Caption after edit.');
    }

    public function testMessageNotFoundException()
    {

    }
}
