<?php

namespace Src\AbstractFactory\Application\Usecase;

use Src\AbstractFactory\Domain\Factories\CompactAbstractFactory;
use Src\AbstractFactory\Domain\Factories\Interface\VehicleAbstractFactory;
use Src\AbstractFactory\Domain\Factories\PremiunAbstractFactory;
use Src\AbstractFactory\Domain\Factories\Provider\AbstractFactoryProvider;
use Src\AbstractFactory\Domain\Factories\SportAbstractFactory;

/**
 * Class AbstractFactoryUseCase
 */
class AbstractFactoryUseCase
{
    public function __construct() {}

    /**
     * 
     */
    public function factory(?string $type): ?VehicleAbstractFactory
    {
        switch ($type) {

            case 'compacto':
                return AbstractFactoryProvider::getFactory(CompactAbstractFactory::class);

            case 'sedán':
                return AbstractFactoryProvider::getFactory(PremiunAbstractFactory::class);

            case 'deportivo':
                return AbstractFactoryProvider::getFactory(SportAbstractFactory::class);

            case 'urbana':
                return AbstractFactoryProvider::getFactory(CompactAbstractFactory::class);

            case 'deportiva':
                return AbstractFactoryProvider::getFactory(PremiunAbstractFactory::class);

            case 'crucero':
                return AbstractFactoryProvider::getFactory(SportAbstractFactory::class);

            case 'liviano':
                return AbstractFactoryProvider::getFactory(CompactAbstractFactory::class);

            case 'pesado':
                return AbstractFactoryProvider::getFactory(PremiunAbstractFactory::class);

            case 'refrigerado':
                return AbstractFactoryProvider::getFactory(SportAbstractFactory::class);

            default:
                return null;
        }
    }

    /**
     *
     */
    public function createTruck($type)
    {
        $factory = $this->factory($type);
        $truck = $factory->createTruck();
        return $truck;
    }

    /**
     * 
     */
    public function createCar($type)
    {
        $factory = $this->factory($type);
        $truck = $factory->createCar();
        return $truck;
    }

    /**
     * 
     */
    public function createMotorcycle($type)
    {
        $factory = $this->factory($type);
        $truck = $factory->createMotorcicle();
        return $truck;
    }
}
