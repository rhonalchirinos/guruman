<?php

namespace Src\Factory\Domain\Factories;

use Src\Models\Vehicle;

/**
 * 
 */
abstract class VehicleFactory
{

    /**
     * 
     */
    public abstract function createVehicle(?string $type = null): ?Vehicle;
}
