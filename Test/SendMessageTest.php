<?php

namespace Makhnanov\Telegram81\Test;

use Makhnanov\Telegram81\Api\Method\Send\SendMessage;
use Makhnanov\Telegram81\Api\Type\Chat;
use Makhnanov\Telegram81\Api\Type\User;

class SendMessageTest extends ParentTestCase
{
    public static function channelDataProvider(): array
    {
        $data = [
            ['you receive message in channel with sound notification'],
            ['you receive message in channel without sound notification',
//                [
//                SendMessage::text => 'https://core.telegram.org/bots/api#formatting-options'
//            ]
            ],
//            ['without preview', [
//                SendMessage::text => 'https://core.telegram.org/bots/api#formatting-options'
//            ]]
        ];
        return array_map(static function ($element) {
            if (isset($element[0]) && !str_contains($element[0], 'with sound')) {
                isset($element[1])
                    ? $element[1][SendMessage::disable_notification] = true
                    : $element[1] = [SendMessage::disable_notification => true];
            }
            return $element;
        }, $data);
    }

    /**
     * @dataProvider channelDataProvider
     */
    public function testToChannel($description, $parameters = []): void
    {
        $this->makeSureThat($description);
        $r = $this->bot->sendMessage(
            $this->getTestChannelId(),
            'Test message to channel.',
            viaArray: $parameters
        );
        $result = $r->getResult();
        $savedKeys = [
            'message_id',
            'sender_chat'
//            => [
//                'id',
//                'title',
//                'username',
//                'type',
//            ]
            ,
            'chat'
//            => [
//                'id',
//                'title',
//                'username',
//                'type',
//            ]
            ,
            'date',
            'text',
        ];
//        dd($result);
        $this->assertResultKeys($result, $savedKeys);
        $this->aboveZero($r->message_id);
        $this->assertClassWithFields($r->sender_chat, Chat::class, function (Chat $arr) {
            $this->assertIsIntBelowZero($arr->id);
            $this->trueString($arr->title);
            $this->trueString($arr->username);
            $this->trueString($arr->type);
            $this->assertSame('channel', $arr->type);
        });
        $this->assertClassWithFields($r->chat, Chat::class, function (Chat $arr) {
            $this->assertIsIntBelowZero($arr->id);
            $this->trueString($arr->title);
            $this->trueString($arr->username);
            $this->trueString($arr->type);
            $this->assertSame('channel', $arr->type);
        });
        $this->assertSame($r->chat->getFullInfo(), [...$r->sender_chat->getFullInfo()]);
        $this->aboveZero($r->date);
        $this->trueString($r->text);

        $this->assertApproveManual();
    }

    //            ['parse mode ' . ParseMode::HTML->name, [
//                SendMessage::parse_mode => ParseMode::HTML,
//                SendMessage::text => <<<STRING
//
//STRING
//            ]],
//            ['parse mode ' . ParseMode::Markdown->name, [
//                SendMessage::parse_mode => ParseMode::Markdown,
//                SendMessage::text => <<<STRING
//
//STRING
//            ]],
//            ['parse mode ' . ParseMode::MarkdownV2->name, [
//                SendMessage::parse_mode => ParseMode::MarkdownV2,
//                SendMessage::text => <<<STRING
//*bold \\text*
//_italic \\text_
//__underline__
//~strikethrough~
//*bold _italic bold ~italic bold strikethrough~ __underline italic bold___ bold*
//[inline URL](http://www.example.com/)
//[inline mention of a user](tg://user?id=123456789)
//`inline fixed-width code`
//```
//pre-formatted fixed-width code block
//```
//```python
//pre-formatted fixed-width code block written in the Python programming language
//```
//STRING,
//            ]],

    public function testSimplePrivateToUser(): void
    {
        $this->makeSureThat('you receive message in bot with sound notification');
        $r = $this->bot->sendMessage(
            $this->getPrivateTestUserId(),
            'Test personal message to bot.'
        );
        $result = $r->getResult();
        $savedKeys = [
            'message_id',
            'from'
//            => [
//                'id',
//                'is_bot',
//                'first_name',
//                'username',
//            ]
            ,
            'chat'
//            => [
//                'id',
//                'title',
//                'username',
//                'type',
//            ]
            ,
            'date',
            'text',
        ];
//        dd($result);
        $this->assertResultKeys($result, $savedKeys);
        $this->aboveZero($r->message_id);
        $this->assertClassWithFields($r->from, User::class, function (User $arr) {
            $this->aboveZero($arr->id);
            $this->assertTrue($arr->is_bot);
            $this->trueString($arr->first_name);
            is_null($arr->username) or $this->trueString($arr->username);
        });
        $this->assertClassWithFields($r->chat, Chat::class, function (Chat $arr) {
            $this->aboveZero($arr->id);
            $this->assertSame('private', $arr->type);
            is_null($arr->first_name) or $this->trueString($arr->first_name);
            is_null($arr->last_name) or $this->trueString($arr->last_name);
            is_null($arr->username) or $this->trueString($arr->username);
        });
        $this->aboveZero($r->date);
        $this->trueString($r->text);

        $this->assertApproveManual();
    }

    public function testMessageTextIsEmptyException()
    {

    }
}
