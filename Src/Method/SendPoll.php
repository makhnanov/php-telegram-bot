<?php

declare(strict_types=1);

namespace Makhnanov\TelegramBot\Method;

use Makhnanov\TelegramBot\Type\Message;

trait SendPoll
{
    public function sendPoll(
        int|string $chatId,
        string $question,
        array $options,
        ?string $businessConnectionId = null,
        ?int $messageThreadId = null,
        ?string $questionParseMode = null,
        ?array $questionEntities = null,
        ?bool $isAnonymous = null,
        ?string $type = null,
        ?bool $allowsMultipleAnswers = null,
        ?int $correctOptionId = null,
        ?string $explanation = null,
        ?string $explanationParseMode = null,
        ?array $explanationEntities = null,
        ?int $openPeriod = null,
        ?int $closeDate = null,
        ?bool $isClosed = null,
        ?bool $disableNotification = null,
        ?bool $protectContent = null,
        ?bool $allowPaidBroadcast = null,
        ?string $messageEffectId = null,
        ?ReplyParameters $replyParameters = null,
        ?InlineKeyboardMarkup $replyMarkup = null,
    ): Message
    {
        $params = [];

        if ($businessConnectionId !== null) {
            $params['business_connection_id'] = $businessConnectionId;
        }
        $params['chat_id'] = $chatId;
        if ($messageThreadId !== null) {
            $params['message_thread_id'] = $messageThreadId;
        }
        $params['question'] = $question;
        if ($questionParseMode !== null) {
            $params['question_parse_mode'] = $questionParseMode;
        }
        if ($questionEntities !== null) {
            $params['question_entities'] = $questionEntities;
        }
        $params['options'] = $options;
        if ($isAnonymous !== null) {
            $params['is_anonymous'] = $isAnonymous;
        }
        if ($type !== null) {
            $params['type'] = $type;
        }
        if ($allowsMultipleAnswers !== null) {
            $params['allows_multiple_answers'] = $allowsMultipleAnswers;
        }
        if ($correctOptionId !== null) {
            $params['correct_option_id'] = $correctOptionId;
        }
        if ($explanation !== null) {
            $params['explanation'] = $explanation;
        }
        if ($explanationParseMode !== null) {
            $params['explanation_parse_mode'] = $explanationParseMode;
        }
        if ($explanationEntities !== null) {
            $params['explanation_entities'] = $explanationEntities;
        }
        if ($openPeriod !== null) {
            $params['open_period'] = $openPeriod;
        }
        if ($closeDate !== null) {
            $params['close_date'] = $closeDate;
        }
        if ($isClosed !== null) {
            $params['is_closed'] = $isClosed;
        }
        if ($disableNotification !== null) {
            $params['disable_notification'] = $disableNotification;
        }
        if ($protectContent !== null) {
            $params['protect_content'] = $protectContent;
        }
        if ($allowPaidBroadcast !== null) {
            $params['allow_paid_broadcast'] = $allowPaidBroadcast;
        }
        if ($messageEffectId !== null) {
            $params['message_effect_id'] = $messageEffectId;
        }
        if ($replyParameters !== null) {
            $params['reply_parameters'] = $replyParameters;
        }
        if ($replyMarkup !== null) {
            $params['reply_markup'] = $replyMarkup;
        }

        $result = $this->api->call('sendPoll', $params);

        return Message::fromArray($result);
    }
}
