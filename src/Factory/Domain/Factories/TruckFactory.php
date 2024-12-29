<?php

namespace Src\Factory\Domain\Factories;

use Src\Models\Truck;
use Src\Models\Vehicle;
use Faker;

/**
 *
 */
class TruckFactory extends VehicleFactory
{

    /**
     * 
     */
    public function createVehicle(string $type = null): ?Vehicle
    {
        $faker = Faker\Factory::create();

        $truck = new Truck();
        $truck->setType($type == null ? 'sedan' : $type);
        $truck->setMotor('Diesel');
        $truck->setColor($faker->colorName());
        $truck->setWheels(2);
        $truck->setCapacity(850);

        return $truck;
    }
}
