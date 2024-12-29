<?php

namespace Src\Builder\Domain\Builders;

use Src\Builder\Domain\Builders\Interface\VehicleBuilder;
use Src\Models\Truck;

class TruckBuilder extends VehicleBuilder
{
    private Truck $truck;

    /**
     * 
     */
    public function reset(): VehicleBuilder
    {
        $this->truck = new Truck();
        return $this;
    }

    /**
     * 
     */
    public function setMotor(...$args): VehicleBuilder
    {
        $this->truck->setMotor($args[0]);
        return $this;
    }

    /**
     * 
     */
    public function setColor(...$args): VehicleBuilder
    {
        $this->truck->setColor($args[0]);
        return $this;
    }

    /**
     * 
     */
    public function setWheels(...$args): VehicleBuilder
    {
        $this->truck->setWheels($args[0]);
        return $this;
    }

    /**
     * 
     */
    public function setCapacity(...$args): VehicleBuilder
    {
        $this->truck->setCapacity($args[0]);
        return $this;
    }

    /**
     * 
     */
    public function setType(...$args): VehicleBuilder
    {
        $this->truck->setType($args[0]);
        return $this;
    }

    /**
     * 
     */
    public function build(...$args): VehicleBuilder
    {
        $faker = \Faker\Factory::create();
        $type = $args['type'];

        $this->reset()
            ->setMotor($this->typeMotor($type))
            ->setColor($faker->colorName())
            ->setWheels(2)
            ->setCapacity(2)
            ->setType($type);

        return $this;
    }

    /**
     * 
     */
    private function typeMotor($type): string
    {
        $faker = \Faker\Factory::create();

        $liviano = [
            'Motor diésel 2.8 L',
            'Motor diésel 3.0 L',
            'Motor diésel 4.0 L'
        ];

        $pesado = [
            'Motor diésel 10 L',
            'Motor diésel 15 L',
            'Kenworth T680 15L'
        ];

        $refrigerado = [
            'Motor diésel 6.0 L',
            'Motor diésel 8.9 L',
            'Kenworth T370'
        ];

        return $faker->randomElement($type == 'liviano' ? $liviano : ($type == 'pesado' ? $pesado : $refrigerado));
    }

    /**
     * 
     */
    public function get(): Truck
    {
        return $this->truck;
    }
}
