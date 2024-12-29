<?php

namespace Src\RickAndMorty\Domain\Model;

/**
 * 
 * @property array $info;
 * @property Location[] $results;
 */
class Locations
{

    private array $info;

    /**
     * @var Location[]
     */
    private array $results;

    /**
     * 
     * @param array $info
     * @param Location[] $results
     */
    public function __construct(array $info, array $results)
    {
        $this->info = $info;
        $this->results = $results;
    }

    public function getInfo(): array
    {
        return $this->info;
    }

    public function setInfo(array $info): void
    {
        $this->info = $info;
    }

    public function getResults(): array
    {
        return $this->results;
    }

    public function setResults(array $results): void
    {
        $this->results = $results;
    }
}
