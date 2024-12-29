<?php

namespace Src\Factory\Application\Usecase;

use Src\Factory\Domain\Factories\Provider\FactoryProvider;
use Faker\Factory;

class FactoryUseCase
{
    public function __construct() {}

    /**
     * 
     */
    public function createTruck($type)
    {
        $factory = FactoryProvider::getFactory('truck');

        return $factory->createVehicle($type);
    }

    /**
     * 
     */
    public function createCar($type)
    {
        $factory = FactoryProvider::getFactory('car');

        return $factory->createVehicle($type);
    }

    /**
     * 
     */
    public function createMotorcycle($type)
    {
        $factory = FactoryProvider::getFactory('motorcycle');

        return $factory->createVehicle($type);
    }


    /**
     * 
     */
    public function generateVehicles($totals)
    {
        $vehicles = [];
        $faker = Factory::create();

        for ($i = 0; $i < $totals; $i++) {
            $vehicle = null;

            switch (rand(1, 3)) {
                case 1:
                    $vehicle = $this->createCar(
                        $faker->randomElement(
                            [
                                "compacto",
                                "sedán",
                                "deportivo"
                            ]
                        )
                    );
                    break;
                case 2:
                    $vehicle = $this->createMotorcycle(
                        $faker->randomElement(
                            [
                                "urbana",
                                "deportiva",
                                "crucero"
                            ]
                        )
                    );
                    break;
                case 3:
                    $vehicle = $this->createTruck(
                        $faker->randomElement(
                            [
                                "liviano",
                                "pesado",
                                "refrigerado"
                            ]
                        )
                    );
                    break;
            }
            $vehicles[] = $vehicle;
        }

        return $vehicles;
    }

    /**
     * 
     */
    public function transportFleet($options = [])
    {
        $totalCar = isset($options['totalCar']) ? $options['totalCar'] : 0;
        $totalMotorcycle = isset($options['totalMotorcycle']) ? $options['totalMotorcycle'] : 0;
        $totalTruck = isset($options['totalTruck']) ? $options['totalTruck'] : 0;

        $vehicles = [];
        $faker = Factory::create();

        for ($i = 0; $i < $totalCar; $i++) {
            $vehicles[] = $this->createCar(
                $faker->randomElement(
                    [
                        "compacto",
                        "sedán",
                        "deportivo"
                    ]
                )
            );
        }

        for ($i = 0; $i < $totalMotorcycle; $i++) {
            $vehicles[] = $this->createMotorcycle(
                $faker->randomElement(
                    [
                        "urbana",
                        "deportiva",
                        "crucero"
                    ]
                )
            );
        }

        for ($i = 0; $i < $totalTruck; $i++) {
            $vehicles[] = $this->createTruck(
                $faker->randomElement(
                    [
                        "liviano",
                        "pesado",
                        "refrigerado"
                    ]
                )
            );
        }

        shuffle($vehicles);

        return $vehicles;
    }
}
