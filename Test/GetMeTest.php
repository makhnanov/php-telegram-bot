<?php

namespace Makhnanov\Telegram81\Test;

class GetMeTest extends ParentTestCase
{
    public function testBasic(): void
    {
        $r = $this->bot->getMe();
        $this->assertResultKeys($r->getResult(), [
            'id',
            'is_bot',
            'first_name',
            'username',
            'can_join_groups',
            'can_read_all_group_messages',
            'supports_inline_queries',
        ]);
        $this->assertGreaterThan(0, $r->id);
        $this->assertTrue($r->is_bot);
        $this->trueString($r->first_name);
        $this->assertNull($r->last_name);
        $this->trueString($r->username);
        $this->assertNull($r->language_code);
        $this->assertIsBool($r->can_join_groups);
        $this->assertIsBool($r->can_read_all_group_messages);
        $this->assertIsBool($r->supports_inline_queries);
        $this->assertIsBool($r->can_connect_to_business);
    }
}
