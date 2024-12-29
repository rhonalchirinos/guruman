<?php

namespace Src\RickAndMorty\Infrastructure\Data;

use Src\RickAndMorty\Domain\Model\Location;
use Nette\Utils\Json;

class LocationData
{

    /**
     * 
     */
    public static function fromArray(array $items)
    {
        $locations = [];

        foreach ($items as $item) {
            $locations[] = [
                'id' => $item->getId(),
                'name' => $item->getName(),
                'type'  => $item->getType(),
                'dimension' => $item->getDimension(),
            ];
        }

        return Json::encode($locations);
    }

    /**
     * @param Location $location
     */
    public static function toJson(Location $location)
    {
        return Json::encode(
            [
                'id' => $location->getId(),
                'name' => $location->getName(),
                'type'  => $location->getType(),
                'dimension' => $location->getDimension(),
            ]
        );
    }
}
