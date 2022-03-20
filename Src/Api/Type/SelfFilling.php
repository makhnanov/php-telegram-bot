<?php

declare(strict_types=1);

namespace Makhnanov\Telegram81\Api\Type;

use GuzzleHttp\Promise\Promise;
use GuzzleHttp\Psr7\Response;
use JetBrains\PhpStorm\Immutable;
use Makhnanov\Telegram81\Api\Enumeration\ChatType;
use Makhnanov\Telegram81\Helper\Informative;
use ReflectionClass;
use ReflectionProperty;

#[Immutable]
abstract class SelfFilling
{
    use Informative;

    public function __construct(array|Response|Promise $data = [])
    {
        if (is_array($data)) {
            foreach ((new ReflectionClass($this))->getProperties(ReflectionProperty::IS_PUBLIC) as $property) {
                $propName = $property->getName();
                $propType = $property->getType()->getName();
                $value = null;
                if (class_exists($propType)) {
                    if ($propType === ChatType::class) {
                        $value = ChatType::tryByName($data[$propName], ChatType::undefined);
                    } elseif(isset($data[$propName])) {
                        $value = new $propType($data[$propName]);
                    }
                } else {
                    $value = $data[$propName] ?? null;
                }
                $property->setValue($this, $value);
            }
        }
    }
}
