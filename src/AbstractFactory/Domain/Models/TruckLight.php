<?php

namespace Src\AbstractFactory\Domain\Models;

use Src\Models\Truck;

class TruckLight implements Truck
{
    public function drive()
    {
        print("Motocicle urban");
    }
}
