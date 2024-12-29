<?php

namespace Src\AbstractFactory\Domain\Models;

use Src\Models\Truck;

class TruckCooled implements Truck
{
    public function drive()
    {
        print("Motocicle urban");
    }
}
