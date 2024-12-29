<?php

namespace Src\RickAndMorty\Infrastructure\Facade;

use Config\Logger;
use Src\RickAndMorty\Domain\Model\Location;
use Src\RickAndMorty\Domain\Model\Locations;
use Src\RickAndMorty\Domain\Port\LocationApiPort;


class LocationApiFacade extends RickAndMortyApiFacade implements LocationApiPort
{

    public function __construct()
    {
        parent::__construct();
    }

    /**
     * 
     */
    public function locations(?array $filters = null): Locations
    {
        $name = $filters['name'] ?? null;
        $type = $filters['type'] ?? null;
        $dimension = $filters['dimension'] ?? null;
        $page = $filters['page'] ?? null;

        try {
            $query = [];

            if ($name) {
                $query['name'] = $name;
            }

            if ($type) {
                $query['type'] = $type;
            }

            if ($dimension) {
                $query['dimension'] = $dimension;
            }

            if ($page) {
                $query['page'] = $page;
            }

            $response = $this->client->get('location', compact('query'));

            if ($response->getStatusCode() === 200) {
                $rawBody = $response->getBody()->getContents();
                $data = json_decode($rawBody, true);

                $locations = new Locations(
                    $data['info'],
                    array_map(
                        function ($item) {
                            return new Location(...$item);
                        },
                        $data['results']
                    )
                );

                return $locations;
            }
        } catch (\GuzzleHttp\Exception\ClientException $e) {
            Logger::error($e->getTraceAsString());
        }

        return null;
    }


    /**
     * @param int $id
     */
    public function location(int $id): ?Location
    {
        try {
            $response = $this->client->get("location/$id");

            if ($response->getStatusCode() === 200) {
                $rawBody = $response->getBody()->getContents();
                $data = json_decode($rawBody, true);

                return new Location(...$data);
            }

            return null;
        } catch (\GuzzleHttp\Exception\ClientException $e) {
            // show log 
            return null;
        }
    }
}
