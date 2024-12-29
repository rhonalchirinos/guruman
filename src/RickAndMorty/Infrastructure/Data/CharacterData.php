<?php

namespace Src\RickAndMorty\Infrastructure\Data;

use Src\RickAndMorty\Domain\Model\Character;
use Src\RickAndMorty\Domain\Model\Characters;
use Nette\Utils\Json;

class CharacterData
{

    /**
     * 
     */
    public static function fromArray(array $items)
    {
        $locations = [];

        foreach ($items as $data) {
            $locations[] = [
                'id' => $data->getId(),
                'name' => $data->getName(),
                'status' => $data->getStatus(),
                'species' => $data->getSpecies(),
                'type' => $data->getType(),
                'gender' => $data->getGender(),
                'origin' => $data->getOrigin(),
                'location' => $data->getLocation(),
                'image' => $data->getImage(),
                'episode' => $data->getEpisode(),
                'url' => $data->getUrl(),
                'created' => $data->getCreated(),
            ];
        }

        return Json::encode($locations);
    }

    /**
     * @param Location $location
     */
    public static function toJson(Character $data)
    {
        return Json::encode(
            [
                'id' => $data->getId(),
                'name' => $data->getName(),
                'status' => $data->getStatus(),
                'species' => $data->getSpecies(),
                'type' => $data->getType(),
                'gender' => $data->getGender(),
                'origin' => $data->getOrigin(),
                'location' => $data->getLocation(),
                'image' => $data->getImage(),
                'episode' => $data->getEpisode(),
                'url' => $data->getUrl(),
                'created' => $data->getCreated(),
            ]
        );
    }
}
