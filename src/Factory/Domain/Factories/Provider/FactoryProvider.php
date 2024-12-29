<?php

namespace Src\Factory\Domain\Factories\Provider;

use Exception;
use Src\Factory\Domain\Factories\CarFactory;
use Src\Factory\Domain\Factories\MotorcycleFactory;
use Src\Factory\Domain\Factories\TruckFactory;
use Src\Factory\Domain\Factories\VehicleFactory;

/**
 * 
 */
abstract class FactoryProvider
{
    private static $factories = [];

    private function __construct() {}

    /**
     * 
     */
    public static function getFactory($factoryType): VehicleFactory
    {
        $factory = null;

        if (isset(self::$factories[$factoryType])) {
            return self::$factories[$factoryType];
        }

        switch ($factoryType) {
            case 'car':
                $factory = new CarFactory();
                break;
            case 'motorcycle':
                $factory = new MotorcycleFactory();
                break;
            case 'truck':
                $factory = new TruckFactory();
                break;
            default:
                throw new Exception("Factory $factoryType not found.");
        }

        self::$factories[$factoryType] = $factory;

        return $factory;
    }
}
