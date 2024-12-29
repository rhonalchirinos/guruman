<?php

namespace Src\AbstractFactory\Domain\Models;

use Src\Models\Motorcicle;

class MotocicleCruiser implements Motorcicle
{
    public function drive()
    {
        print("Motocicle spoert");
    }
}
