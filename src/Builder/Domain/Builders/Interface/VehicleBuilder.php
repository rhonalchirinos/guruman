<?php

namespace Src\Builder\Domain\Builders\Interface;

use Src\Models\Vehicle;

abstract class VehicleBuilder
{

    /**
     * 
     */
    public abstract function setMotor(...$args): VehicleBuilder;

    /**
     * 
     */
    public abstract function setColor(...$args): VehicleBuilder;

    /**
     * 
     */
    public abstract function setWheels(...$args): VehicleBuilder;

    /**
     * 
     */
    public abstract function setCapacity(...$args): VehicleBuilder;

    /**
     * 
     */
    public abstract function setType(...$args): VehicleBuilder;

    /**
     * 
     */
    public abstract function build(...$args): VehicleBuilder;

    /**
     * 
     */
    public abstract function get(): Vehicle;
}
