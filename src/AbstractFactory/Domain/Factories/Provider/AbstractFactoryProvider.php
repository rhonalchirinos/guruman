<?php

namespace Src\AbstractFactory\Domain\Factories\Provider;

use Src\AbstractFactory\Domain\Factories\Interface\VehicleAbstractFactory;

class AbstractFactoryProvider
{
    private static $instances = [];

    private function __construct() {}

    public static function getFactory($factory): VehicleAbstractFactory
    {
        if (!isset(self::$instances[$factory])) {
            self::$instances[$factory] = new $factory();
        }

        return self::$instances[$factory];
    }
}
