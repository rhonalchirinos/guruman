<?php

namespace Src\AbstractFactory\Domain\Factories;

use Src\AbstractFactory\Domain\Factories\Interface\VehicleAbstractFactory;

use Src\Models\Car;
use Src\Models\Motorcicle;
use Src\Models\Truck;
use Faker;

/**
 * 
 */
class CompactAbstractFactory extends VehicleAbstractFactory
{
    /**
     * 
     */
    public function createCar(): ?Car
    {
        $faker = Faker\Factory::create();

        $car = new Car();
        $car->setType('compacto');
        $car->setMotor('1.6');
        $car->setColor($faker->colorName());
        $car->setWheels(4);
        $car->setCapacity(5);

        return $car;
    }

    /**
     * 
     */
    public function createMotorcicle(): ?Motorcicle
    {
        $faker = Faker\Factory::create();

        $motorcicle = new Motorcicle();
        $motorcicle->setType('urbana');
        $motorcicle->setMotor($faker->randomElement(['150cc', '200cc', '250cc']));
        $motorcicle->setColor($faker->colorName());
        $motorcicle->setWheels(2);
        $motorcicle->setCapacity(2);

        return $motorcicle;
    }

    /**
     * 
     */
    public function createTruck(): ?Truck
    {
        $faker = Faker\Factory::create();

        $truck = new Truck();
        $truck->setType('liviano');
        $truck->setMotor('2.0');
        $truck->setColor($faker->colorName());
        $truck->setWheels(6);
        $truck->setCapacity($faker->randomElement([3000, 3500, 7500]));

        return $truck;
    }
}
