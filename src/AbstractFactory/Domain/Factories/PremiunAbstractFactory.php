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
class PremiunAbstractFactory extends VehicleAbstractFactory
{

    /**
     * 
     */
    public function createCar(): ?Car
    {
        $faker = Faker\Factory::create();

        $car = new Car();
        $car->setType('sedán');
        $car->setMotor('2.1');
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
        $motorcicle->setType('deportiva');
        $motorcicle->setMotor('250cc');
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
        $truck->setType('pesado');
        $truck->setMotor('4.0');
        $truck->setColor($faker->colorName());
        $truck->setWheels(10);
        $truck->setCapacity(12000);

        return $truck;
    }
}
