<?php

namespace Src\RickAndMorty\Infrastructure\Facade;

use Config\Logger;

use Src\RickAndMorty\Domain\Model\Character;

use Src\RickAndMorty\Domain\Model\Characters;
use Src\RickAndMorty\Domain\Port\CharacterApiPort;

class CharacterApiFacade extends RickAndMortyApiFacade implements CharacterApiPort
{

    public function __construct()
    {
        parent::__construct();
    }

    /**
     * 
     */
    public function characters(?array $filters = null): Characters
    {
        $name = $filters['name'] ?? null;
        $status = $filters['status'] ?? null;
        $species = $filters['species'] ?? null;
        $type = $filters['type'] ?? null;
        $gender = $filters['gender'] ?? null;
        $page = $filters['page'] ?? null;

        try {
            $query = [];

            if ($name) {
                $query['name'] = $name;
            }

            if ($status) {
                $query['status'] = $status;
            }

            if ($species) {
                $query['species'] = $species;
            }

            if ($type) {
                $query['type'] = $type;
            }

            if ($gender) {
                $query['gender'] = $gender;
            }

            if ($page) {
                $query['page'] = $page;
            }

            $response = $this->client->get('character', compact('query'));

            if ($response->getStatusCode() === 200) {
                $rawBody = $response->getBody()->getContents();
                $data = json_decode($rawBody, true);

                $characters = new Characters(
                    $data['info'],
                    array_map(
                        function ($item) {
                            return new Character(...$item);
                        },
                        $data['results']
                    )
                );

                return $characters;
            }
        } catch (\GuzzleHttp\Exception\ClientException $e) {
            Logger::error($e->getTraceAsString());
        }

        return null;
    }


    /**
     * @param int $id
     */
    public function character(int $id): ?Character
    {
        try {
            $response = $this->client->get("character/$id");

            if ($response->getStatusCode() === 200) {
                $rawBody = $response->getBody()->getContents();
                $data = json_decode($rawBody, true);

                return new Character(...$data);
            }

            return null;
        } catch (\GuzzleHttp\Exception\ClientException $e) {
            // show log 
            return null;
        }
    }
}
