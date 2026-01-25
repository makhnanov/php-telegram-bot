<?php

declare(strict_types=1);

namespace Makhnanov\TelegramBot\Type;

readonly class Sticker
{
    public function __construct(
        public string $fileId,
        public string $fileUniqueId,
        public string $type,
        public int $width,
        public int $height,
        public bool $isAnimated,
        public bool $isVideo,
        public ?PhotoSize $thumbnail = null,
        public ?string $emoji = null,
        public ?string $setName = null,
        public ?File $premiumAnimation = null,
        public ?MaskPosition $maskPosition = null,
        public ?string $customEmojiId = null,
        public ?bool $needsRepainting = null,
        public ?int $fileSize = null,
    ) {}

    public static function fromArray(array $data): self
    {
        return new self(
            fileId: $data['file_id'],
            fileUniqueId: $data['file_unique_id'],
            type: $data['type'],
            width: $data['width'],
            height: $data['height'],
            isAnimated: $data['is_animated'],
            isVideo: $data['is_video'],
            thumbnail: isset($data['thumbnail']) ? PhotoSize::fromArray($data['thumbnail']) : null,
            emoji: $data['emoji'] ?? null,
            setName: $data['set_name'] ?? null,
            premiumAnimation: isset($data['premium_animation']) ? File::fromArray($data['premium_animation']) : null,
            maskPosition: isset($data['mask_position']) ? MaskPosition::fromArray($data['mask_position']) : null,
            customEmojiId: $data['custom_emoji_id'] ?? null,
            needsRepainting: $data['needs_repainting'] ?? null,
            fileSize: $data['file_size'] ?? null,
        );
    }
}
