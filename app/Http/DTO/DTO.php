<?php

namespace App\Http\DTO;

use Illuminate\Contracts\Support\Arrayable;
use ReflectionClass;
use ReflectionProperty;

abstract class DTO implements Arrayable
{
    public function toArray(): array
    {
        $array = [];

        $reflection = new ReflectionClass($this);
        $properties = $reflection->getProperties(ReflectionProperty::IS_PRIVATE);

        foreach ($properties as $property) {
            $propertyName = $property->getName();
            $array[$propertyName] = $property->getValue($this);
        }

        return $array;
    }
}
