<?php

declare(strict_types=1);

namespace Makhnanov\TelegramBot\Type;

readonly class UniqueGift
{
    public function __construct(
        public string $giftId,
        public string $baseName,
        public string $name,
        public int $number,
        public UniqueGiftModel $model,
        public UniqueGiftSymbol $symbol,
        public UniqueGiftBackdrop $backdrop,
        public ?bool $isPremium = null,
        public ?bool $isFromBlockchain = null,
        public ?UniqueGiftColors $colors = null,
        public ?Chat $publisherChat = null,
    ) {}

    public static function fromArray(array $data): self
    {
        return new self(
            giftId: $data['gift_id'],
            baseName: $data['base_name'],
            name: $data['name'],
            number: $data['number'],
            model: UniqueGiftModel::fromArray($data['model']),
            symbol: UniqueGiftSymbol::fromArray($data['symbol']),
            backdrop: UniqueGiftBackdrop::fromArray($data['backdrop']),
            isPremium: $data['is_premium'] ?? null,
            isFromBlockchain: $data['is_from_blockchain'] ?? null,
            colors: isset($data['colors']) ? UniqueGiftColors::fromArray($data['colors']) : null,
            publisherChat: isset($data['publisher_chat']) ? Chat::fromArray($data['publisher_chat']) : null,
        );
    }
}
