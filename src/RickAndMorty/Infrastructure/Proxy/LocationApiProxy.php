<?php

namespace Src\RickAndMorty\Infrastructure\Proxy;

use Psr\SimpleCache\CacheInterface;
use Src\RickAndMorty\Domain\Model\Location;
use Src\RickAndMorty\Domain\Model\Locations;
use Src\RickAndMorty\Domain\Port\LocationApiPort;
use Src\RickAndMorty\Infrastructure\Facade\LocationApiFacade;

class LocationApiProxy implements LocationApiPort
{

    private LocationApiPort $locationApiPort;

    private CacheInterface $cache;

    const CACHE_DURATION_MS = 10_000;
    const CACHE_KEY = 'rick_and_morty_location_';

    public function __construct(LocationApiFacade $locationApiPort, CacheInterface $cache)
    {
        $this->locationApiPort = $locationApiPort;
        $this->cache = $cache;
    }

    /**
     * 
     */
    public function locations(?array $filters = null): Locations
    {
        ksort($filters);
        $keyCache = $this->getKey(
            hash(
                'sha256',
                http_build_query($filters)
            )
        );

        if ($this->cache->has($keyCache)) {
            return $this->cache->get($keyCache);
        }

        $locations = new Locations([], []);
        $page = 1;

        do {
            $filters['page'] = $page;
            $results = $this->locationApiPort->locations($filters);
            $page = $page + 1;
            if ($results->getInfo()['next'] == null) {
                $page = -1;
            }
            $locations->setResults(
                array_merge(
                    $locations->getResults(),
                    $results->getResults()
                )
            );
        } while ($page != -1);

        if ($locations) {
            $this->cache->set($keyCache, $locations, self::CACHE_DURATION_MS);
        }

        return $locations;
    }


    /**
     * @param int $id
     */
    public function location(int $id): ?Location
    {
        $idCache = $this->getKey($id);

        if ($this->cache->has($idCache)) {
            return $this->cache->get($idCache);
        }

        $location = $this->locationApiPort->location($id);

        if ($location) {
            $this->cache->set($idCache, $location, self::CACHE_DURATION_MS);
        }

        return $location;
    }

    /**
     * @param int|string $name
     */
    public function getKey(int|string $name)
    {
        return self::CACHE_KEY . "$name";
    }
}
