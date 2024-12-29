<?php

namespace Src\RickAndMorty\Infrastructure\Facade;

use Config\Logger;
use Src\RickAndMorty\Domain\Model\Episode;
use Src\RickAndMorty\Domain\Model\Episodes;
use Src\RickAndMorty\Domain\Port\EpisodeApiPort;

class EpisodeApiFacade extends RickAndMortyApiFacade implements EpisodeApiPort
{

    public function __construct()
    {
        parent::__construct();
    }

    /**
     * 
     */
    public function episodes(?array $filters = null): Episodes
    {
        $name = $filters['name'] ?? null;
        $episode = $filters['episode'] ?? null;
        $page = $filters['page'] ?? null;

        try {
            $query = [];

            if ($name) {
                $query['name'] = $name;
            }

            if ($episode) {
                $query['episode'] = $episode;
            }

            if ($page) {
                $query['page'] = $page;
            }

            $response = $this->client->get('episode', compact('query'));

            if ($response->getStatusCode() === 200) {
                $rawBody = $response->getBody()->getContents();
                $data = json_decode($rawBody, true);

                $episodes = new Episodes(
                    $data['info'],
                    array_map(
                        function ($item) {
                            return new Episode(...$item);
                        },
                        $data['results']
                    )
                );

                return $episodes;
            }
        } catch (\GuzzleHttp\Exception\ClientException $e) {
            Logger::error($e->getTraceAsString());
        }

        return null;
    }


    /**
     * @param int $id
     */
    public function episode(int $id): ?Episode
    {
        try {
            $response = $this->client->get("episode/$id");

            if ($response->getStatusCode() === 200) {
                $rawBody = $response->getBody()->getContents();
                $data = json_decode($rawBody, true);

                return new Episode(...$data);
            }

            return null;
        } catch (\GuzzleHttp\Exception\ClientException $e) {
            // show log 
            return null;
        }
    }
}
