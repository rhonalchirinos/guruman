<?php

namespace Src\AbstractFactory\Domain\Models;

use Src\Models\Car;

class CarCompact implements Car
{
    public function drive()
    {
        print("Driving a compact car");
    }
}
