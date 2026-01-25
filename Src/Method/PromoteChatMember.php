<?php

declare(strict_types=1);

namespace Makhnanov\TelegramBot\Method;

trait PromoteChatMember
{
    public function promoteChatMember(
        int|string $chatId,
        int $userId,
        ?bool $isAnonymous = null,
        ?bool $canManageChat = null,
        ?bool $canDeleteMessages = null,
        ?bool $canManageVideoChats = null,
        ?bool $canRestrictMembers = null,
        ?bool $canPromoteMembers = null,
        ?bool $canChangeInfo = null,
        ?bool $canInviteUsers = null,
        ?bool $canPostStories = null,
        ?bool $canEditStories = null,
        ?bool $canDeleteStories = null,
        ?bool $canPostMessages = null,
        ?bool $canEditMessages = null,
        ?bool $canPinMessages = null,
        ?bool $canManageTopics = null,
        ?bool $canManageDirectMessages = null,
    ): bool
    {
        $params = [];

        $params['chat_id'] = $chatId;
        $params['user_id'] = $userId;
        if ($isAnonymous !== null) {
            $params['is_anonymous'] = $isAnonymous;
        }
        if ($canManageChat !== null) {
            $params['can_manage_chat'] = $canManageChat;
        }
        if ($canDeleteMessages !== null) {
            $params['can_delete_messages'] = $canDeleteMessages;
        }
        if ($canManageVideoChats !== null) {
            $params['can_manage_video_chats'] = $canManageVideoChats;
        }
        if ($canRestrictMembers !== null) {
            $params['can_restrict_members'] = $canRestrictMembers;
        }
        if ($canPromoteMembers !== null) {
            $params['can_promote_members'] = $canPromoteMembers;
        }
        if ($canChangeInfo !== null) {
            $params['can_change_info'] = $canChangeInfo;
        }
        if ($canInviteUsers !== null) {
            $params['can_invite_users'] = $canInviteUsers;
        }
        if ($canPostStories !== null) {
            $params['can_post_stories'] = $canPostStories;
        }
        if ($canEditStories !== null) {
            $params['can_edit_stories'] = $canEditStories;
        }
        if ($canDeleteStories !== null) {
            $params['can_delete_stories'] = $canDeleteStories;
        }
        if ($canPostMessages !== null) {
            $params['can_post_messages'] = $canPostMessages;
        }
        if ($canEditMessages !== null) {
            $params['can_edit_messages'] = $canEditMessages;
        }
        if ($canPinMessages !== null) {
            $params['can_pin_messages'] = $canPinMessages;
        }
        if ($canManageTopics !== null) {
            $params['can_manage_topics'] = $canManageTopics;
        }
        if ($canManageDirectMessages !== null) {
            $params['can_manage_direct_messages'] = $canManageDirectMessages;
        }

        return $this->api->call('promoteChatMember', $params);
    }
}
