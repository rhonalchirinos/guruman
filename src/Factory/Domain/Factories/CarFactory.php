<?php

namespace Src\Factory\Domain\Factories;

use Src\Models\Car;
use Src\Models\Vehicle;
use Faker;

/**
 *
 */
class CarFactory extends VehicleFactory
{
    /**
     * 
     */
    public function createVehicle(string $type = null): ?Vehicle
    {
        $faker = Faker\Factory::create();

        $car = new Car();
        $car->setType($type == null ? 'sedan' : $type);
        $car->setMotor('1.6');
        $car->setColor($faker->colorName());
        $car->setWheels(4);
        $car->setCapacity(5);

        return $car;
    }
}
