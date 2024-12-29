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
class SportAbstractFactory extends VehicleAbstractFactory
{

    /**
     * 
     */
    public function createCar(): ?Car
    {
        $faker = Faker\Factory::create();

        $car = new Car();
        $car->setType('deportivo');
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
        $motorcicle->setType('crucero');
        $motorcicle->setMotor('400cc');
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
        $truck->setType('refrigerado');
        $truck->setMotor('2.0');
        $truck->setColor($faker->colorName());
        $truck->setWheels(6);
        $truck->setCapacity(7200);

        return $truck;
    }
}
