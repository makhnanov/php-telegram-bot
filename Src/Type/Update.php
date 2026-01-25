<?php

declare(strict_types=1);

namespace Makhnanov\TelegramBot\Type;

readonly class Update
{
    public function __construct(
        public int $updateId,
        public ?Message $message = null,
        public ?Message $editedMessage = null,
        public ?Message $channelPost = null,
        public ?Message $editedChannelPost = null,
        public ?BusinessConnection $businessConnection = null,
        public ?Message $businessMessage = null,
        public ?Message $editedBusinessMessage = null,
        public ?BusinessMessagesDeleted $deletedBusinessMessages = null,
        public ?MessageReactionUpdated $messageReaction = null,
        public ?MessageReactionCountUpdated $messageReactionCount = null,
        public ?InlineQuery $inlineQuery = null,
        public ?ChosenInlineResult $chosenInlineResult = null,
        public ?CallbackQuery $callbackQuery = null,
        public ?ShippingQuery $shippingQuery = null,
        public ?PreCheckoutQuery $preCheckoutQuery = null,
        public ?PaidMediaPurchased $purchasedPaidMedia = null,
        public ?Poll $poll = null,
        public ?PollAnswer $pollAnswer = null,
        public ?ChatMemberUpdated $myChatMember = null,
        public ?ChatMemberUpdated $chatMember = null,
        public ?ChatJoinRequest $chatJoinRequest = null,
        public ?ChatBoostUpdated $chatBoost = null,
        public ?ChatBoostRemoved $removedChatBoost = null,
    ) {}

    public static function fromArray(array $data): self
    {
        return new self(
            updateId: $data['update_id'],
            message: isset($data['message']) ? Message::fromArray($data['message']) : null,
            editedMessage: isset($data['edited_message']) ? Message::fromArray($data['edited_message']) : null,
            channelPost: isset($data['channel_post']) ? Message::fromArray($data['channel_post']) : null,
            editedChannelPost: isset($data['edited_channel_post']) ? Message::fromArray($data['edited_channel_post']) : null,
            businessConnection: isset($data['business_connection']) ? BusinessConnection::fromArray($data['business_connection']) : null,
            businessMessage: isset($data['business_message']) ? Message::fromArray($data['business_message']) : null,
            editedBusinessMessage: isset($data['edited_business_message']) ? Message::fromArray($data['edited_business_message']) : null,
            deletedBusinessMessages: isset($data['deleted_business_messages']) ? BusinessMessagesDeleted::fromArray($data['deleted_business_messages']) : null,
            messageReaction: isset($data['message_reaction']) ? MessageReactionUpdated::fromArray($data['message_reaction']) : null,
            messageReactionCount: isset($data['message_reaction_count']) ? MessageReactionCountUpdated::fromArray($data['message_reaction_count']) : null,
            inlineQuery: isset($data['inline_query']) ? InlineQuery::fromArray($data['inline_query']) : null,
            chosenInlineResult: isset($data['chosen_inline_result']) ? ChosenInlineResult::fromArray($data['chosen_inline_result']) : null,
            callbackQuery: isset($data['callback_query']) ? CallbackQuery::fromArray($data['callback_query']) : null,
            shippingQuery: isset($data['shipping_query']) ? ShippingQuery::fromArray($data['shipping_query']) : null,
            preCheckoutQuery: isset($data['pre_checkout_query']) ? PreCheckoutQuery::fromArray($data['pre_checkout_query']) : null,
            purchasedPaidMedia: isset($data['purchased_paid_media']) ? PaidMediaPurchased::fromArray($data['purchased_paid_media']) : null,
            poll: isset($data['poll']) ? Poll::fromArray($data['poll']) : null,
            pollAnswer: isset($data['poll_answer']) ? PollAnswer::fromArray($data['poll_answer']) : null,
            myChatMember: isset($data['my_chat_member']) ? ChatMemberUpdated::fromArray($data['my_chat_member']) : null,
            chatMember: isset($data['chat_member']) ? ChatMemberUpdated::fromArray($data['chat_member']) : null,
            chatJoinRequest: isset($data['chat_join_request']) ? ChatJoinRequest::fromArray($data['chat_join_request']) : null,
            chatBoost: isset($data['chat_boost']) ? ChatBoostUpdated::fromArray($data['chat_boost']) : null,
            removedChatBoost: isset($data['removed_chat_boost']) ? ChatBoostRemoved::fromArray($data['removed_chat_boost']) : null,
        );
    }
}
