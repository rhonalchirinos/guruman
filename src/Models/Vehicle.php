<?php

namespace Src\Models;

use JsonSerializable;

abstract class Vehicle implements JsonSerializable
{
    private string $motor;
    private string $color;
    private int $wheels;
    private int $capacity;
    private string $type;

    // getters and setters
    public function getMotor(): string
    {
        return $this->motor;
    }

    public function setMotor(string $motor): void
    {
        $this->motor = $motor;
    }

    public function getColor(): string
    {
        return $this->color;
    }

    public function setColor(string $color): void
    {
        $this->color = $color;
    }

    public function getWheels(): int
    {
        return $this->wheels;
    }

    public function getType(): string
    {
        return $this->type;
    }

    public function setWheels(int $wheels): void
    {
        $this->wheels = $wheels;
    }

    public function getCapacity(): int
    {
        return $this->capacity;
    }

    public function setCapacity(int $capacity): void
    {
        $this->capacity = $capacity;
    }

    public function setType(string $type): void
    {
        $this->type = $type;
    }

    /**
     * 
     */
    public function drive()
    {
        return 'Driving a vehicle';
    }

    /**
     * 
     */
    public function jsonSerialize(): mixed
    {
        return [
            'motor' => $this->motor,
            'color' => $this->color,
            'wheels' => $this->wheels,
            'capacity' => $this->capacity
        ];
    }
}
