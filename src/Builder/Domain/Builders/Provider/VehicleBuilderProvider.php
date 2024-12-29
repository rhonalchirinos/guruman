<?php

namespace Src\Builder\Domain\Builders\Provider;

use Src\Builder\Domain\Builders\CarBuilder;
use Src\Builder\Domain\Builders\Interface\VehicleBuilder;
use Src\Builder\Domain\Builders\MotocicleBuilder;
use Src\Builder\Domain\Builders\TruckBuilder;

class VehicleBuilderProvider
{

    private static $instances = [];

    private function __construct() {}

    /**
     * 
     */
    public static function getInstance($factory): VehicleBuilder
    {
        if (!isset(self::$instances[$factory])) {
            switch ($factory) {
                case  MotocicleBuilder::class:
                    self::$instances[$factory] = new MotocicleBuilder();
                    break;
                case  CarBuilder::class:
                    self::$instances[$factory] = new CarBuilder();
                    break;
                case  TruckBuilder::class:
                    self::$instances[$factory] = new TruckBuilder();
                    break;
                default:
                    throw new \Exception("Builder not found");
            }
        }

        return self::$instances[$factory];
    }
}
