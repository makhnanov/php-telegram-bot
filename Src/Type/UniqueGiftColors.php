<?php

declare(strict_types=1);

namespace Makhnanov\TelegramBot\Type;

readonly class UniqueGiftColors
{
    public function __construct(
        public string $modelCustomEmojiId,
        public string $symbolCustomEmojiId,
        public int $lightThemeMainColor,
        public array $lightThemeOtherColors,
        public int $darkThemeMainColor,
        public array $darkThemeOtherColors,
    ) {}

    public static function fromArray(array $data): self
    {
        return new self(
            modelCustomEmojiId: $data['model_custom_emoji_id'],
            symbolCustomEmojiId: $data['symbol_custom_emoji_id'],
            lightThemeMainColor: $data['light_theme_main_color'],
            lightThemeOtherColors: $data['light_theme_other_colors'],
            darkThemeMainColor: $data['dark_theme_main_color'],
            darkThemeOtherColors: $data['dark_theme_other_colors'],
        );
    }
}
