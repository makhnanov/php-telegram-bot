<?php

namespace Makhnanov\Telegram81\Api\Type;

use Makhnanov\Telegram81\Api\Enumeration\ChatType;

class Chat extends SelfFilling
{
    /**
     * @var int Unique identifier for this chat.
     * This number may have more than 32 significant bits and some programming
     * languages may have difficulty/silent defects in interpreting it.
     * But it has at most 52 significant bits, so a signed 64-bit integer
     * or double-precision float type are safe for storing this identifier.
     */
    public int $id;

    /**
     * @var String Type of chat, can be either “private”, “group”, “supergroup” or “channel”
     * @see ChatType
     */
    public string $type;

    /**
     * @var string|null @Optional. Title, for supergroups, channels and group chats
     */
    public ?string $title;

    /**
     * @var string|null @Optional. Username, for private chats, supergroups and channels if available
     */
    public ?string $username;

    /**
     * @var string|null @Optional. First name of the other party in a private chat
     */
    public ?string $first_name;

    /**
     * @var string|null @Optional. Last name of the other party in a private chat
     */
    public ?string $last_name;

    /**
     * @var null|ChatPhoto @Optional. Chat photo. Returned only in getChat.
     */
    public ?ChatPhoto $photo;

    /**
     * @var string|null @Optional. Bio of the other party in a private chat. Returned only in getChat.
     */
    public ?string $bio;

    /**
     * @var string|null @Optional. Description, for groups, supergroups and channel chats. Returned only in getChat.
     */
    public ?string $description;

    /**
     * @var string|null @Optional. Primary invite link, for groups, supergroups and channel chats.
     * Returned only in getChat.
     */
    public ?string $invite_link;

    /**
     * @var Message|null @Optional. The most recent pinned message (by sending date). Returned only in getChat.
     */
    public ?Message $pinned_message;

//   /**
//    * @var chatpermissions|null @Optional. Default chat member permissions, for groups and supergroups.
//    * Returned only in getChat.
//    */
//   public ?chatpermissions $permissions;

    /**
     * @var int|null @Optional. For supergroups, the minimum allowed delay between consecutive messages sent by each
     * unpriviledged user. Returned only in getChat.
     */
    public ?int $slow_mode_delay;

    /**
     * @var int|null @Optional. The time after which all messages sent to the chat will be automatically deleted;
     * in seconds. Returned only in getChat.
     */
    public ?int $message_auto_delete_time;

    /**
     * @var string|null @Optional. For supergroups, name of group sticker set. Returned only in getChat.
     */
    public ?string $sticker_set_name;

    /**
     * @var bool|null @Optional. True, if the bot can change the group sticker set. Returned only in getChat.
     */
    public ?bool $can_set_sticker_set;

    /**
     * @var int|null @Optional. Unique identifier for the linked chat, i.e. the discussion group identifier for a
     * channel and vice versa; for supergroups and channel chats. This identifier may be greater than 32 bits and some
     * programming languages may have difficulty/silent defects in interpreting it. But it is smaller than 52 bits,
     * so a signed 64 bit integer or double-precision float type are safe for storing this identifier.
     * Returned only in getChat
     */
    public ?int $linked_chat_id;

//    /**
//     * @var chatlocation|null @Optional. For supergroups, the location to which the supergroup is connected.
//     * Returned only in getChat.
//     */
//    public ?chatlocation $location;

}
