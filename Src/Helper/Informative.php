<?php

namespace Makhnanov\TelegramBot\Helper;

use Makhnanov\TelegramBot\Api\Type\SelfFilling;
use ReflectionProperty;

trait Informative
{
    public function getFullInfo(): array
    {
        foreach ((new \ReflectionClass($this))->getProperties(ReflectionProperty::IS_PUBLIC) as $property) {
            $name = $property->getName();
            $type = $property->getType()->getName();
            if (isset($this->$name)) {
                if (in_array($type, ['string', 'int', 'bool', 'array'], true)) {
                    $fields[$name] = $this->$name;
                } else {
                    /**
                     * @var $fillable SelfFilling
                     */
                    $fillable = $this->$name;
                    $fields[$name] = $fillable->getFullInfo();
                }
            }
        }
        return $fields ?? [];
    }
}
