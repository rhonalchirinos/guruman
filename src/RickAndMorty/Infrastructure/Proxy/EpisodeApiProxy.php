<?php

namespace Src\RickAndMorty\Infrastructure\Proxy;

use Psr\SimpleCache\CacheInterface;
use Src\RickAndMorty\Domain\Model\Episode;
use Src\RickAndMorty\Domain\Model\Episodes;
use Src\RickAndMorty\Domain\Port\EpisodeApiPort;
use Src\RickAndMorty\Infrastructure\Facade\EpisodeApiFacade;

class EpisodeApiProxy implements EpisodeApiPort
{

    private EpisodeApiPort  $episodeApiPort;

    private CacheInterface $cache;

    const CACHE_DURATION_MS = 10_000;
    const CACHE_KEY = 'rick_and_morty_episode_';

    public function __construct(EpisodeApiFacade $episodeApiPort, CacheInterface $cache)
    {
        $this->episodeApiPort =  $episodeApiPort;
        $this->cache = $cache;
    }

    /**
     * 
     */
    public function episodes(?array $filters = null): Episodes
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

        $episodes = new Episodes([], []);
        $page = 1;

        do {
            $filters['page'] = $page;
            $results = $this->episodeApiPort->episodes($filters);
            $page = $page + 1;
            if ($results->getInfo()['next'] == null) {
                $page = -1;
            }
            $episodes->setResults(
                array_merge(
                    $episodes->getResults(),
                    $results->getResults()
                )
            );
        } while ($page != -1);

        if ($episodes) {
            $this->cache->set($keyCache,  $episodes, self::CACHE_DURATION_MS);
        }

        return  $episodes;
    }


    /**
     * @param int $id
     */
    public function episode(int $id): ?Episode
    {
        $idCache = $this->getKey($id);

        if ($this->cache->has($idCache)) {
            return $this->cache->get($idCache);
        }

        $episode = $this->episodeApiPort->episode($id);

        if ($episode) {
            $this->cache->set($idCache,  $episode, self::CACHE_DURATION_MS);
        }

        return  $episode;
    }

    /**
     * @param int|string $name
     */
    public function getKey(int|string $name)
    {
        return self::CACHE_KEY . "$name";
    }
}
