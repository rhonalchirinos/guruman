<?php

namespace Src\RickAndMorty\Domain\Port;

use Src\RickAndMorty\Domain\Model\Episode;
use Src\RickAndMorty\Domain\Model\Episodes;

interface EpisodeApiPort
{
    /**
     * Retorna una lista de Episode.
     * @param int[]|null $ids
     * @param string[]|null $filters
     * 
     */
    public function episodes(?array $filters): Episodes;
    public function episode(int $id): ?Episode;
}
