<?php

namespace Src\RickAndMorty\Infrastructure\Facade;

use GuzzleHttp\Client;

/**
 * @property Client $client
 */
class RickAndMortyApiFacade
{
    protected Client $client;

    public function __construct()
    {
        $this->client = new Client(
            [
                'base_uri' => 'https://rickandmortyapi.com/api/',
            ]
        );
    }

    public function getClient(): Client
    {
        return $this->client;
    }
}
