<?php

declare(strict_types=1);

namespace Makhnanov\TelegramBot\Method;

use Makhnanov\TelegramBot\Type\File;

trait GetFile
{
    public function getFile(
        string $fileId,
    ): File
    {
        $params = [];

        $params['file_id'] = $fileId;

        $result = $this->api->call('getFile', $params);

        return File::fromArray($result);
    }
}
