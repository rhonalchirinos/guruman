<?php

namespace Src\Builder\Domain\Builders;

use Src\Builder\Domain\Builders\Interface\VehicleBuilder;
use Src\Models\Motorcicle;

class MotocicleBuilder extends VehicleBuilder
{
    private Motorcicle $motorcicle;

    /**
     * 
     */
    public function reset(): VehicleBuilder
    {
        $this->motorcicle = new Motorcicle();
        return $this;
    }

    /**
     * 
     */
    public function setMotor(...$args): MotocicleBuilder
    {
        $this->motorcicle->setMotor($args[0]);
        return $this;
    }

    /**
     * 
     */
    public function setColor(...$args): VehicleBuilder
    {
        $this->motorcicle->setColor($args[0]);
        return $this;
    }

    /**
     * 
     */
    public function setWheels(...$args): VehicleBuilder
    {
        $this->motorcicle->setWheels($args[0]);
        return $this;
    }

    /**
     * 
     */
    public function setCapacity(...$args): VehicleBuilder
    {
        $this->motorcicle->setCapacity($args[0]);
        return $this;
    }

    /**
     * 
     */
    public function setType(...$args): VehicleBuilder
    {
        $this->motorcicle->setType($args[0]);
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

        $urbana = [
            '150CC',
            '200CC',
            '250CC'
        ];

        $crucero = [
            'V-Twin 883 cc',
            'V-Twin 1800 cc',
            'Thunderstroke 116'
        ];

        $sports = [
            '600 cc DOHC',
            '1000cc DOHC',
            'V4 1000CC'
        ];

        return $faker->randomElement($type == 'urbana' ? $urbana : ($type == 'crucero' ? $crucero : $sports));
    }

    /**
     * 
     */
    public function get(): Motorcicle
    {
        return $this->motorcicle;
    }
}
