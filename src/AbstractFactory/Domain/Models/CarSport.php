<?php

namespace Src\AbstractFactory\Domain\Models;

use Src\Models\Car;

class CarSport implements Car
{
    public function drive()
    {
        print("Driving a sport car");
    }
}
