<?php

namespace Src\AbstractFactory\Domain\Models;

use Src\Models\Motorcicle;

class MotocicleSport implements Motorcicle
{
    public function drive()
    {
        print("Motocicle spoert");
    }
}
