<?php

namespace Src\Factory\Domain\Factories;

use Src\Models\Vehicle;
use Src\Models\Motorcicle;
use Faker;

/**
 *
 */
class MotorcycleFactory extends VehicleFactory
{

    /**
     * 
     */
    public function createVehicle(?string $type = null): ?Vehicle
    {
        $faker = Faker\Factory::create();

        $motor = new Motorcicle();
        $motor->setType($type == null ? 'sedan' : $type);
        $motor->setMotor('2 cylinders');
        $motor->setColor($faker->colorName());
        $motor->setWheels(2);
        $motor->setCapacity(250);

        return $motor;
    }
}
