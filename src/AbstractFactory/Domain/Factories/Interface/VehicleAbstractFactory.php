<?php

namespace Src\AbstractFactory\Domain\Factories\Interface;

use Src\Models\Car;
use Src\Models\Motorcicle;
use Src\Models\Truck;

/**
 * 
 */
abstract class VehicleAbstractFactory
{
    /**
     * 
     */
    public abstract function createCar(): ?Car;

    /**
     * 
     */
    public abstract function createMotorcicle(): ?Motorcicle;

    /**
     * 
     */
    public abstract function createTruck(): ?Truck;
}
