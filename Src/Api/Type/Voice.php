<?php

namespace Makhnanov\Telegram81\Api\Type;

class Voice extends SelfFilling
{
    /**
     * Identifier for this file, which can be used to download or reuse the file
     */
    public string $file_id;
    
    /**
     * Unique identifier for this file, which is supposed to be the same over time and for different bots. Can't be used to download or reuse the file.
     */
    public string $file_unique_id;
    
    /**
     * Duration of the audio in seconds as defined by sender
     */
    public int $duration;
    
    /**
     * @Optional. MIME type of the file as defined by sender
     */
    public string $mime_type;
    
    /**
     * @Optional. File size
     */
    public int $file_size;
}
