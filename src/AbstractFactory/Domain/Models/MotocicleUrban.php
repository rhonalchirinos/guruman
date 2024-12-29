<?php

namespace Src\AbstractFactory\Domain\Models;

use Src\Models\Motorcicle;

class MotocicleUrban implements Motorcicle
{
    public function drive()
    {
        print("Motocicle urban");
    }
}
