<?php

namespace Src\AbstractFactory\Domain\Models;

use Src\Models\Car;

class CarSedan implements Car
{
    public function drive()
    {
        print("Driving a sedan car");
    }
}
