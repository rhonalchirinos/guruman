<?php

namespace Src\Models;

class Car extends Vehicle
{
    public function drive()
    {
        return 'Driving a car';
    }

    /**
     * 
     */
    public function jsonSerialize(): mixed
    {
        return array_merge(
            parent::jsonSerialize(),
            [
                'type' => 'Car - ' . $this->getType(),
            ]
        );
    }
}
