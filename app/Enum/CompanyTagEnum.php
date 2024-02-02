<?php

declare(strict_types=1);

namespace App\Enum;

class CompanyTagEnum
{
    const NONE = null;
    const BAR = 'BAR';
    const BAZ = 'BAZ';
    const FOO = 'FOO';

    public static function getAll(): array {
        $reflectionClass = new \ReflectionClass(static::class);
        $constants = $reflectionClass->getConstants();

        unset($constants['NONE']);

        return $constants;
    }
}
