<?php

namespace Makhnanov\Telegram81\Test;

class EditMessageMediaTest extends ParentTestCase
{
    public function testViaId(): void
    {
        $cheese = 'AgACAgIAAxkBAAIBHWF6ovBmYI2Q4HOJAnQoBuqKZCg6AAKqtzEb8JzZS4u0kETHTM5tAQADAgADcwADIQQ';
        $twitter = 'AgACAgIAAxkBAAIBH2F6pDfWCf_TWGIT_FXoMgfJDQHVAAKttzEb8JzZS8_LbFFHWFJ1AQADAgADeQADIQQ';
        $r = $this->bot->sendPhoto(
            $this->getPrivateTestUserId(),
            $cheese
        );
//        dd($r->getResult());
        sleep(2);
        $this->bot->editMessageMedia(
            [
                'type' => 'photo',
                'media' => $twitter,
                //                'caption' => ,
                //                'parse_mode' => ,
                //                'caption_entities' => ,
            ],
            $r->chat->id,
            $r->message_id
        );
    }
}
