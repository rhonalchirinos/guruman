<?php

namespace Src\RickAndMorty\Apllication\Usecase;

use Src\RickAndMorty\Domain\Model\Character;
use Src\RickAndMorty\Domain\Model\Episode;
use Src\RickAndMorty\Domain\Model\Location;
use Src\RickAndMorty\Domain\Port\CharacterApiPort;
use Src\RickAndMorty\Domain\Port\EpisodeApiPort;
use Src\RickAndMorty\Domain\Port\LocationApiPort;


class RickAndMortyUseCase
{

    private LocationApiPort $locationApi;
    private CharacterApiPort $characterApi;
    private EpisodeApiPort $episodeApi;

    /**
     * 
     */
    public function __construct(
        LocationApiPort $locationApi,
        CharacterApiPort $characterApi,
        EpisodeApiPort $episodeApi
    ) {
        $this->locationApi = $locationApi;
        $this->characterApi = $characterApi;
        $this->episodeApi = $episodeApi;
    }

    /**
     * 
     * @return Location[]   
     */
    public function locations(...$args): array
    {
        $locations = $this->locationApi->locations($args);

        return $locations->getResults();
    }

    /**
     * 
     */
    public function location(int $id): Location
    {
        return $this->locationApi->location($id);
    }

    /**
     * 
     * @return Character[]   
     */
    public function characters(...$args): array
    {
        $locations = $this->characterApi->characters($args);

        return $locations->getResults();
    }

    /**
     * 
     */
    public function character(int $id): Character
    {
        return $this->characterApi->character($id);
    }

    /**
     * 
     * @return Episode[]   
     */
    public function episodes(...$args): array
    {
        $locations = $this->episodeApi->episodes($args);
        return $locations->getResults();
    }

    /**
     * 
     */
    public function episode(int $id): Episode
    {
        return $this->episodeApi->episode($id);
    }
}
