<?php

namespace Src\Models;

class Motorcicle extends Vehicle
{
    public function drive()
    {
        return 'Driving a motorcicle';
    }

    /**
     * 
     */
    public function jsonSerialize(): mixed
    {
        return array_merge(
            parent::jsonSerialize(),
            [
                'type' => 'Motorcicle - ' . $this->getType(),
            ]
        );
    }
}
