<?php /** @noinspection GrazieInspection */

namespace Makhnanov\Telegram81\Api\Method;

use Makhnanov\Telegram81\Api\Exception\NoResultException;
use Stringable;

use function Makhnanov\Telegram81\jDecode;

trait DeleteMessageTrait
{
    /**
     * @url https://core.telegram.org/bots/api#deletemessage
     *
     * @description
     * Use this method to delete a message, including service messages, with the following limitations:
     *  - A message can only be deleted if it was sent less than 48 hours ago.
     *  - A dice message in a private chat can only be deleted if it was sent more than 24 hours ago.
     *  - Bots can delete outgoing messages in private chats, groups, and supergroups.
     *  - Bots can delete incoming messages in private chats.
     *  - Bots granted can_post_messages permissions can delete outgoing messages in channels.
     *  - If the bot is an administrator of a group, it can delete any message there.
     *  - If the bot has can_delete_messages permission in a supergroup or a channel, it can delete any message there.
     *  Returns True on success.
     *
     * @param int|string|Stringable $chat_id Unique identifier for the target chat or username of the target channel
     * in the format @channelusername
     *
     * @param int|string|Stringable $message_id Identifier of the message to delete
     *
     * @return bool only True
     *
     * @noinspection PhpUnusedParameterInspection
     *
     * @throws NoResultException
     */
    public function deleteMessage(
        int|string|Stringable $chat_id,
        int|string|Stringable $message_id
    ) {
        [$usefulNames, $parameterValues] = $this->viaArray(__FUNCTION__);
        foreach ($parameterValues as $name => $value) {
            $$name = $value;
        }
        $response = $this->getResponse(__FUNCTION__, compact(...$usefulNames));
        $decoded = jDecode($response)['result'] ?? throw new NoResultException();
        return $decoded === true ?: throw new NoResultException();
    }
}
