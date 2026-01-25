<?php

declare(strict_types=1);

namespace Makhnanov\TelegramBot\Type;

readonly class ExternalReplyInfo
{
    public function __construct(
        public MessageOrigin $origin,
        public ?Chat $chat = null,
        public ?int $messageId = null,
        public ?LinkPreviewOptions $linkPreviewOptions = null,
        public ?Animation $animation = null,
        public ?Audio $audio = null,
        public ?Document $document = null,
        public ?PaidMediaInfo $paidMedia = null,
        public ?array $photo = null,
        public ?Sticker $sticker = null,
        public ?Story $story = null,
        public ?Video $video = null,
        public ?VideoNote $videoNote = null,
        public ?Voice $voice = null,
        public ?bool $hasMediaSpoiler = null,
        public ?Checklist $checklist = null,
        public ?Contact $contact = null,
        public ?Dice $dice = null,
        public ?Game $game = null,
        public ?Giveaway $giveaway = null,
        public ?GiveawayWinners $giveawayWinners = null,
        public ?Invoice $invoice = null,
        public ?Location $location = null,
        public ?Poll $poll = null,
        public ?Venue $venue = null,
    ) {}

    public static function fromArray(array $data): self
    {
        return new self(
            origin: MessageOrigin::fromArray($data['origin']),
            chat: isset($data['chat']) ? Chat::fromArray($data['chat']) : null,
            messageId: $data['message_id'] ?? null,
            linkPreviewOptions: isset($data['link_preview_options']) ? LinkPreviewOptions::fromArray($data['link_preview_options']) : null,
            animation: isset($data['animation']) ? Animation::fromArray($data['animation']) : null,
            audio: isset($data['audio']) ? Audio::fromArray($data['audio']) : null,
            document: isset($data['document']) ? Document::fromArray($data['document']) : null,
            paidMedia: isset($data['paid_media']) ? PaidMediaInfo::fromArray($data['paid_media']) : null,
            photo: isset($data['photo']) ? array_map(PhotoSize::fromArray(...), $data['photo']) : null,
            sticker: isset($data['sticker']) ? Sticker::fromArray($data['sticker']) : null,
            story: isset($data['story']) ? Story::fromArray($data['story']) : null,
            video: isset($data['video']) ? Video::fromArray($data['video']) : null,
            videoNote: isset($data['video_note']) ? VideoNote::fromArray($data['video_note']) : null,
            voice: isset($data['voice']) ? Voice::fromArray($data['voice']) : null,
            hasMediaSpoiler: $data['has_media_spoiler'] ?? null,
            checklist: isset($data['checklist']) ? Checklist::fromArray($data['checklist']) : null,
            contact: isset($data['contact']) ? Contact::fromArray($data['contact']) : null,
            dice: isset($data['dice']) ? Dice::fromArray($data['dice']) : null,
            game: isset($data['game']) ? Game::fromArray($data['game']) : null,
            giveaway: isset($data['giveaway']) ? Giveaway::fromArray($data['giveaway']) : null,
            giveawayWinners: isset($data['giveaway_winners']) ? GiveawayWinners::fromArray($data['giveaway_winners']) : null,
            invoice: isset($data['invoice']) ? Invoice::fromArray($data['invoice']) : null,
            location: isset($data['location']) ? Location::fromArray($data['location']) : null,
            poll: isset($data['poll']) ? Poll::fromArray($data['poll']) : null,
            venue: isset($data['venue']) ? Venue::fromArray($data['venue']) : null,
        );
    }
}
