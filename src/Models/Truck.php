<?php

namespace Src\Models;

class Truck extends Vehicle
{
    public function drive()
    {
        return 'Driving a truck';
    }

    /**
     * 
     */
    public function jsonSerialize(): mixed
    {
        return array_merge(
            parent::jsonSerialize(),
            [
                'type' => 'Truck - ' . $this->getType(),
            ]
        );
    }
}
