<?php

declare(strict_types=1);

namespace Makhnanov\TelegramBot\Type;

/**
 * This object describes a message that can be inaccessible to the bot.
 * It can be one of: Message, InaccessibleMessage
 */
interface MaybeInaccessibleMessage
{
    public Chat $chat { get; }
    public int $messageId { get; }
    public int $date { get; }

    public static function fromArray(array $data): self;
}