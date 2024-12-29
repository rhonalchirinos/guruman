<?php

namespace Src\RickAndMorty\Domain\Port;

use Src\RickAndMorty\Domain\Model\Character;
use Src\RickAndMorty\Domain\Model\Characters;

interface CharacterApiPort
{
    /**
     * Retorna una lista de Character.
     * @param int[]|null $ids
     * @param string[]|null $filters
     * 
     */
    public function characters(?array $filters): Characters;
    public function character(int $id): ?Character;
}
