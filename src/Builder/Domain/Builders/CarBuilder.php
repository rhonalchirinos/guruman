<?php

namespace Src\Builder\Domain\Builders;

use Src\Builder\Domain\Builders\Interface\VehicleBuilder;
use Src\Models\Car;

class CarBuilder extends VehicleBuilder
{
    private Car $car;

    /**
     * 
     */
    public function reset(): CarBuilder
    {
        $this->car = new Car();
        return $this;
    }

    /**
     * 
     */
    public function setMotor(...$args): CarBuilder
    {
        $this->car->setMotor($args[0]);
        return $this;
    }

    /**
     * 
     */
    public function setColor(...$args): CarBuilder
    {
        $this->car->setColor($args[0]);
        return $this;
    }

    /**
     * 
     */
    public function setWheels(...$args): CarBuilder
    {
        $this->car->setWheels($args[0]);
        return $this;
    }

    /**
     * 
     */
    public function setCapacity(...$args): CarBuilder
    {
        $this->car->setCapacity($args[0]);
        return $this;
    }

    /**
     * 
     */
    public function setType(...$args): CarBuilder
    {
        $this->car->setType($args[0]);
        return $this;
    }

    /**
     * 
     */
    public function build(...$args): CarBuilder
    {
        $faker = \Faker\Factory::create();
        $type = $args['type'];

        $this->reset()
            ->setMotor($this->typeMotor($type))
            ->setColor($faker->colorName())
            ->setWheels(4)
            ->setCapacity(250)
            ->setType($type);

        return $this;
    }

    /**
     * 
     */
    private function typeMotor($type): string
    {
        $faker = \Faker\Factory::create();

        $compact = [
            'Motor 2.0L Dynamic Force',
            'Motor 1.5L VTEC Turbo',
            'Motor 1.4L TSI'
        ];

        $sedans = [
            'Motor 2.5L Dynamic Force',
            'Motor 1.5L VTEC Turbo',
            'Motor 2.5L Skyactiv-G'
        ];

        $sports = [
            'Motor 6.2L V8 LT2',
            'Motor 5.0L V8 Coyote',
            'Motor 3.0L Turbo H6'
        ];

        return $faker->randomElement($type == 'compact' ? $compact : ($type == 'sedan' ? $sedans : $sports));
    }

    /**
     * 
     */
    public function get(): Car
    {
        return $this->car;
    }
}
