<?php

namespace Src\RickAndMorty\Domain\Port;

use Src\RickAndMorty\Domain\Model\Location;
use Src\RickAndMorty\Domain\Model\Locations;

interface LocationApiPort
{
    /**
     * Retorna una lista de Location.
     * @param int[]|null $ids
     * @param string[]|null $filters
     * 
     */
    public function locations(?array $filters): Locations;
    public function location(int $id): ?Location;
}
