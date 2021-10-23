<?php

namespace Makhnanov\Telegram81\Helper;

use JetBrains\PhpStorm\Pure;

class ViaArray
{
    #[Pure]
    public static function array(array $parameters = []): self
    {
        return new self($parameters);
    }

    public function __construct(array $parameters)
    {
        foreach ($parameters as $key => $value) {
            if (!is_string($key)) {
                // Non-string keys will be ignored.
                continue;
            }
            $this->$key = $value;
        }
    }

    public function __get(string $name)
    {
        return null;
    }
}
