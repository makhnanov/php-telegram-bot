<?php

declare(strict_types=1);

namespace Makhnanov\Telegram81\Api\Type;

use GuzzleHttp\Promise\Promise;
use GuzzleHttp\Psr7\Response;
use JetBrains\PhpStorm\Immutable;
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
                /**
                 * todo handle union
                 */
                $propType = $property->getType()->getName();
                $propName !== 'bot' and /* Check Update Class */ $property->setValue(
                    $this,
                    class_exists($propType)
                        ? (isset($data[$propName]) ? new $propType($data[$propName]) : null)
                        : $data[$propName] ?? null
                );
            }
        }
    }
}
