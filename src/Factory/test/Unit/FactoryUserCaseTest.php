<?php

use Src\Factory\Application\Usecase\FactoryUseCase;

use Src\Factory\Domain\Factories\CarFactory;
use Src\Factory\Domain\Factories\MotorcycleFactory;
use Src\Factory\Domain\Factories\Provider\FactoryProvider;
use Src\Factory\Domain\Factories\TruckFactory;

use Src\Models\Car;
use Src\Models\Motorcicle;
use Src\Models\Truck;
use Src\Models\Vehicle;

test(
    'factory-car',
    function () {
        $carFactory = FactoryProvider::getFactory('car');
        expect($carFactory)->toBeInstanceOf(CarFactory::class);

        $car = $carFactory->createVehicle();
        expect($car)->toBeInstanceOf(Car::class);
        expect($car->getMotor())->not->toBeNull();
        expect($car->getColor())->not->toBeNull();
        expect($car->getWheels())->not->toBeNull();
        expect($car->getCapacity())->not->toBeNull();

        $motorcycleFactory = FactoryProvider::getFactory('motorcycle');
        expect($motorcycleFactory)->toBeInstanceOf(MotorcycleFactory::class);

        $motorcycle = $motorcycleFactory->createVehicle();
        expect($motorcycle)->toBeInstanceOf(Motorcicle::class);
        expect($motorcycle->getMotor())->not->toBeNull();
        expect($motorcycle->getColor())->not->toBeNull();
        expect($motorcycle->getWheels())->not->toBeNull();
        expect($motorcycle->getCapacity())->not->toBeNull();


        $truckFactory = FactoryProvider::getFactory('truck');
        expect($truckFactory)->toBeInstanceOf(TruckFactory::class);

        $truck = $truckFactory->createVehicle();
        expect($truck)->toBeInstanceOf(Truck::class);
        expect($truck->getMotor())->not->toBeNull();
        expect($truck->getColor())->not->toBeNull();
        expect($truck->getWheels())->not->toBeNull();
        expect($truck->getCapacity())->not->toBeNull();
    }
);


test(
    'factory-use-case',
    function () {
        $useCase = new FactoryUseCase();
        $vehicles = $useCase->generateVehicles(50);
        expect($vehicles)->toBeArray()->toHaveCount(50)->each->toBeInstanceOf(Vehicle::class);
        $fleet = $useCase->transportFleet(
            [
                'totalCar' => 10,
                'totalMotorcycle' => 25,
                'totalTruck' => 15
            ]
        );
        expect($fleet)->toBeArray()->toHaveCount(50)->each->toBeInstanceOf(Vehicle::class);
        $filter = fn($array, $instance) => array_filter(
            $array,
            fn($vehicle) => $vehicle instanceof $instance
        );
        expect($filter($fleet, Car::class))->toBeArray()->toHaveCount(10)->each->toBeInstanceOf(Car::class);
        expect($filter($fleet, Motorcicle::class))->toBeArray()->toHaveCount(25)->each->toBeInstanceOf(Motorcicle::class);
        expect($filter($fleet, Truck::class))->toBeArray()->toHaveCount(15)->each->toBeInstanceOf(Truck::class);
    }
);

test(
    'factory-car-sedan',
    function () {
        $useCase = new FactoryUseCase();
        $type = "sedan";
        $car = $useCase->createCar($type);

        expect($car)->toBeInstanceOf(Car::class);
        expect($car->getType())->toBe($type);
    }
);


test(
    'factory-car-truck',
    function () {
        $useCase = new FactoryUseCase();
        $type = "liviano";
        $car = $useCase->createTruck($type);

        expect($car)->toBeInstanceOf(Truck::class);
        expect($car->getType())->toBe($type);
    }
);
