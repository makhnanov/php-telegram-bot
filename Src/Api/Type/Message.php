<?php

namespace Makhnanov\Telegram81\Api\Type;

use GuzzleHttp\Promise\Promise;
use GuzzleHttp\Psr7\Response;
use Makhnanov\Telegram81\Api\Enumeration\ChatType;
use Makhnanov\Telegram81\Api\Exception\NoResultException;
use Makhnanov\Telegram81\Helper\ResponsiveResultativeInterface;
use Makhnanov\Telegram81\Helper\ResponsiveResultativeTrait;
use ReflectionClass;
use ReflectionProperty;

use function Makhnanov\Telegram81\jDecode;

/**
 * @url https://core.telegram.org/bots/api#message
 *
 * @example
 */
class Message implements ResponsiveResultativeInterface
{
    use ResponsiveResultativeTrait;

    private array $result;

    private Response $response;

    /**
     * Unique message identifier inside this chat.
     */
    public int $message_id;

    /**
     * Date the message was sent in Unix time
     */
    public int $date;

    /**
     * Conversation the message belongs to
     */
    public Chat $chat;

    public ?User $from;                                                      # @Optional. Sender, empty for messages sent to channels
    public ?Chat $sender_chat;                                               # @Optional. Sender of the message, sent on behalf of a chat. The channel itself for channel messages. The supergroup itself for messages from anonymous group administrators. The linked channel for messages automatically forwarded to the discussion group
    public ?User $forward_from;                                              # @Optional. For forwarded messages, sender of the original message
    public ?Chat $forward_from_chat;                                         # @Optional. For messages forwarded from channels or from anonymous administrators, information about the original sender chat
    public ?int $forward_from_message_id;                                    # @Optional. For messages forwarded from channels, identifier of the original message in the channel
    public ?string $forward_signature;                                       # @Optional. For messages forwarded from channels, signature of the post author if present
    public ?string $forward_sender_name;                                     # @Optional. Sender's name for messages forwarded from users who disallow adding a link to their account in forwarded messages
    public ?int $forward_date;                                               # @Optional. For forwarded messages, date the original message was sent in Unix time
    public ?Message $reply_to_message;                                       # @Optional. For replies, the original message. Note that the Message object in this field will not contain further reply_to_message fields even if it itself is a reply.
    public ?User $via_bot;                                                   # @Optional. Bot through which the message was sent

    /**
     * @Optional. Date the message was last edited in Unix time
     */
    public ?int $edit_date;

    public ?string $media_group_id;                                          # @Optional. The unique identifier of a media message group this message belongs to
    public ?string $author_signature;                                        # @Optional. Signature of the post author for messages in channels, or the custom title of an anonymous group administrator
    public ?string $text;                                                    # @Optional. For text messages, the actual UTF-8 text of the message, 0-4096 characters
//    /*MessageEntity*/
//    public ?array entities;                                                  # @Optional. For text messages, special entities like usernames, URLs, bot commands, etc. that appear in the text
//    public ?Animation animation;                                             # @Optional. Message is an animation, information about the animation. For backward compatibility, when this field is set, the document field will also be set
//    public ?Audio audio;                                                     # @Optional. Message is an audio file, information about the file
//    public ?Document document;                                               # @Optional. Message is a general file, information about the file

    /**
     * @Optional. Message is a photo, available sizes of the photo
     */
    public ?PhotoSizeCollection $photo;

//    public ?Sticker sticker;                                                 # @Optional. Message is a sticker, information about the sticker
//    public ?Video video;                                                     # @Optional. Message is a video, information about the video
//    public ?Videonote video_note;                                            # @Optional. Message is a video note, information about the video message
    public ?Voice $voice;                                                     # @Optional. Message is a voice message, information about the file
    public ?string $caption;                                                   # @Optional. Caption for the animation, audio, document, photo, video or voice, 0-1024 characters
//    public ?MessageEntity[] caption_entities;                                # @Optional. For messages with a caption, special entities like usernames, URLs, bot commands, etc. that appear in the caption
//    public ?Contact contact;                                                 # @Optional. Message is a shared contact, information about the contact
//    public ?Dice dice;                                                       # @Optional. Message is a dice with random value
//    public ?Game game;                                                       # @Optional. Message is a game, information about the game. More about games »
//    public ?Poll poll;                                                       # @Optional. Message is a native poll, information about the poll
//    public ?Venue venue;                                                     # @Optional. Message is a venue, information about the venue. For backward compatibility, when this field is set, the location field will also be set
//    public ?Location location;                                               # @Optional. Message is a shared location, information about the location
//    public ?User[] new_chat_members;                                         # @Optional. New members that were added to the group or supergroup and information about them (the bot itself may be one of these members)
    public ?User $left_chat_member;                                            # @Optional. A member was removed from the group, information about them (this member may be the bot itself)
    public ?string $new_chat_title;                                            # @Optional. A chat title was changed to this value
//    public ?PhotoSize[] new_chat_photo;                                      # @Optional. A chat photo was change to this value
    public ?bool $delete_chat_photo;                                           # true @Optional. Service message: the chat photo was deleted
    public ?bool $group_chat_created;                                          # true @Optional. Service message: the group has been created
    public ?bool $supergroup_chat_created;                                     # true @Optional. Service message: the supergroup has been created. This field can't be received in a message coming through updates, because bot can't be a member of a supergroup when it is created. It can only be found in reply_to_message if someone replies to a very first message in a directly created supergroup.
    public ?bool $channel_chat_created;                                        # true @Optional. Service message: the channel has been created. This field can't be received in a message coming through updates, because bot can't be a member of a channel when it is created. It can only be found in reply_to_message if someone replies to a very first message in a channel.
//    public ?Messageautodeletetimerchanged message_auto_delete_timer_changed; # @Optional. Service message: auto-delete timer settings changed in the chat                           Optional. Service message: auto-delete timer settings changed in the chat
    public ?int $migrate_to_chat_id;                                           # @Optional. The group has been migrated to a supergroup with the specified identifier. This number may have more than 32 significant bits and some programming languages may have difficulty/silent defects in interpreting it. But it has at most 52 significant bits, so a signed 64-bit int or double-precision float type are safe for storing this identifier.
    public ?int $migrate_from_chat_id;                                         # @Optional. The supergroup has been migrated from a group with the specified identifier. This number may have more than 32 significant bits and some programming languages may have difficulty/silent defects in interpreting it. But it has at most 52 significant bits, so a signed 64-bit int or double-precision float type are safe for storing this identifier.
    public ?Message $pinned_message;                                           # @Optional. Specified message was pinned. Note that the Message object in this field will not contain further reply_to_message fields even if it is itself a reply.
//    public ?Invoice invoice;                                                 # @Optional. Message is an invoice for a payment, information about the invoice. More about payments »
//    public ?Successfulpayment successful_payment;                            # @Optional. Message is a service message about a successful payment, information about the payment. More about payments »
    public ?string $connected_website;                                         # @Optional. The domain name of the website on which the user has logged in. More about Telegram Login »
//    public ?Passportdata passport_data;                                      # @Optional. Telegram Passport data
//    public ?Proximityalerttriggered proximity_alert_triggered;               # @Optional. Service message. A user in the chat triggered another user's proximity alert while sharing Live Location.
//    public ?Voicechatscheduled voice_chat_scheduled;                         # @Optional. Service message: voice chat scheduled
//    public ?Voicechatstarted voice_chat_started;                             # @Optional. Service message: voice chat started
//    public ?Voicechatended voice_chat_ended;                                 # @Optional. Service message: voice chat ended
//    public ?Voicechatparticipantsinvited voice_chat_participants_invited;    # @Optional. Service message: new participants invited to a voice chat
    /**
     * @Optional. Inline keyboard attached to the message.
     * login_url buttons are represented as ordinary url buttons.
     */
    public ?array $reply_markup; // |InlineKeyboardMarkup

    public function __construct(array|Response|Promise $data = [])
    {
        $this->response = $data;
        $this->result = jDecode($this->response)['result'] ?? throw new NoResultException();
        if (is_array($data)) {
            foreach ((new ReflectionClass($this))->getProperties(ReflectionProperty::IS_PUBLIC) as $property) {
                $propName = $property->getName();
                $propType = $property->getType()->getName();
                $value = null;
                if (class_exists($propType)) {
                    if ($propType === ChatType::class) {
                        $value = ChatType::tryByName($data[$propName], ChatType::undefined);
                    } elseif(isset($data[$propName])) {
                        $value = new $propType($data[$propName]);
                    }
                } else {
                    $value = $data[$propName] ?? null;
                }
                $property->setValue($this, $value);
            }
        }
    }
}
