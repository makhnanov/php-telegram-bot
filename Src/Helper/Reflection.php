<?php
declare(strict_types=1);

namespace Makhnanov\Telegram81\Helper;

use Makhnanov\Telegram81\Api\Exception\BadCodeException;
use Makhnanov\Telegram81\Api\Exception\TypeError;
use ReflectionClass;
use ReflectionNamedType;
use ReflectionUnionType;
use Yiisoft\Arrays\ArrayHelper;

trait Reflection
{
    public function viaArray(string $function, ?array $viaArray = [], array $ignored = []): array
    {
        // make to Arbitrator class
        $inputParameter = (new ReflectionClass($this))->getMethod($function)->getParameters();
        $inputNames = [];
        $nameValue = [];
        foreach ($inputParameter as $oneParameter) {
            $name = $oneParameter->getName();

            if (in_array($name, $ignored, true)) {
                continue;
            }

            $inputNames[] = $name;

            if (isset($viaArray[$name])) {

                if (!$oneParameter->hasType()) {
                    /** @noinspection PhpUnhandledExceptionInspection */
                    throw new BadCodeException();
                }

                $reflectionType = $oneParameter->getType();

                if (
                    $reflectionType instanceof ReflectionNamedType
                    && !$this->isTypeSame($reflectionType->getName(), $viaArray, $name)
                ) {
                    throw new TypeError();
                } elseif ($reflectionType instanceof ReflectionUnionType) {
                    $throw = true;
                    foreach ($reflectionType->getTypes() as $type) {
                        if ($this->isTypeSame($type->getName(), $viaArray, $name)) {
                            $throw = false;
                            break;
                        }
                    }
                    $throw and throw new TypeError();
                }

                $nameValue[$name] = $viaArray[$name];
            }
        }

        ArrayHelper::removeValue($inputNames, 'viaArray');

        return [$inputNames, $nameValue];
    }

    private function isTypeSame(string $typeOrClass, array $viaArray, string $parameterName): bool
    {
        return (class_exists($typeOrClass) && is_a($viaArray[$parameterName], $typeOrClass))
            || ($typeOrClass === 'bool' && gettype($viaArray[$parameterName]) === 'boolean')
            || $typeOrClass === gettype($viaArray[$parameterName]);
    }
}
