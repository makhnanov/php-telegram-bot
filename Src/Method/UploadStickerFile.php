<?php

declare(strict_types=1);

namespace Makhnanov\TelegramBot\Method;

use Makhnanov\TelegramBot\Type\File;

trait UploadStickerFile
{
    public function uploadStickerFile(
        int $userId,
        string $sticker,
        string $stickerFormat,
    ): File
    {
        $params = [];

        $params['user_id'] = $userId;
        $params['sticker'] = $sticker;
        $params['sticker_format'] = $stickerFormat;

        $result = $this->api->call('uploadStickerFile', $params);

        return File::fromArray($result);
    }
}
