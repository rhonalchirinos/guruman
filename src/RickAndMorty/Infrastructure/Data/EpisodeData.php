<?php

namespace Src\RickAndMorty\Infrastructure\Data;

use Src\RickAndMorty\Domain\Model\Episode;
use Nette\Utils\Json;

class EpisodeData
{

    /**
     * 
     */
    public static function fromArray(array $items)
    {
        $locations = [];

        foreach ($items as $episode) {
            $locations[] = $episode->toArray();
        }

        return Json::encode($locations);
    }

    /**
     * @param Location $location
     */
    public static function toJson(Episode $episode)
    {
        return Json::encode($episode->toArray());
    }
}
