<?php

namespace Src\Builder\Application\Usecase;

use Src\Builder\Domain\Builders\CarBuilder;
use Src\Builder\Domain\Builders\MotocicleBuilder;
use Src\Builder\Domain\Builders\Provider\VehicleBuilderProvider;
use Src\Builder\Domain\Builders\TruckBuilder;

use Src\Models\Car;
use Src\Models\Motorcicle;
use Src\Models\Truck;

/**
 * Class AbstractFactoryUseCase
 */
class BuilderUseCase
{
    public function __construct() {}

    /**
     * 
     */
    public function createCar(string $type = "compact"): Car
    {
        /**
         * @var VehicleBuilder $builder
         */
        $builder = VehicleBuilderProvider::getInstance(CarBuilder::class);

        return $builder->build(...compact('type'))->get();
    }

    /**
     * 
     */
    public function createMotorcycle(string $type = "urbana"): Motorcicle
    {
        /**
         * @var MotocicleBuilder $builder
         */
        $builder = VehicleBuilderProvider::getInstance(MotocicleBuilder::class);

        return $builder->build(...compact('type'))->get();
    }


    /**
     * 
     */
    public function createTruck(string $type = "liviano"): Truck
    {
        /**
         * @var MotocicleBuilder $builder
         */
        $builder = VehicleBuilderProvider::getInstance(TruckBuilder::class);

        return $builder->build(...compact('type'))->get();
    }
}
