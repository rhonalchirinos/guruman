<?php

namespace Src\RickAndMorty\Infrastructure\Proxy;

use Src\RickAndMorty\Domain\Model\Character;
use Psr\SimpleCache\CacheInterface;
use Src\RickAndMorty\Domain\Model\Characters;
use Src\RickAndMorty\Domain\Port\CharacterApiPort;

class CharacterApiProxy implements CharacterApiPort
{

    private CharacterApiPort $characterApiPort;

    private CacheInterface $cache;

    const CACHE_DURATION_MS = 10_000;
    const CACHE_KEY = 'rick_and_morty_character_';

    public function __construct(CharacterApiPort $characterApiPort, CacheInterface $cache)
    {
        $this->characterApiPort = $characterApiPort;
        $this->cache = $cache;
    }

    /**
     * 
     */
    public function characters(?array $filters = null): Characters
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

        $characters = new Characters([], []);
        $page = 1;

        do {
            $filters['page'] = $page;
            $results = $this->characterApiPort->characters($filters);
            $page = $page + 1;
            if ($results->getInfo()['next'] == null) {
                $page = -1;
            }
            $characters->setResults(
                array_merge(
                    $characters->getResults(),
                    $results->getResults()
                )
            );
        } while ($page != -1);

        if ($characters) {
            $this->cache->set($keyCache, $characters, self::CACHE_DURATION_MS);
        }

        return $characters;
    }


    /**
     * @param int $id
     */
    public function character(int $id): ?Character
    {
        $idCache = $this->getKey($id);

        if ($this->cache->has($idCache)) {
            return $this->cache->get($idCache);
        }

        $character = $this->characterApiPort->character($id);

        if ($character) {
            $this->cache->set($idCache, $character, self::CACHE_DURATION_MS);
        }

        return $character;
    }

    /**
     * @param int|string $name
     */
    public function getKey(int|string $name)
    {
        return self::CACHE_KEY . "$name";
    }
}
