<?php

namespace Src\RickAndMorty\Infrastructure\Actions;

use Nette\Utils\Json;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;

use Src\RickAndMorty\Apllication\Usecase\RickAndMortyUseCase;
use Src\RickAndMorty\Infrastructure\Data\CharacterData;

class CharacterAction
{
    /**
     * 
     */
    public function __construct(private RickAndMortyUseCase $rickAndMortyUseCase) {}

    /**
     * 
     */
    public function characters(ServerRequestInterface $request, ResponseInterface $response, array $args): ResponseInterface
    {
        $queryParams = $request->getQueryParams();
        $locations = $this->rickAndMortyUseCase->characters(...$queryParams);

        $response->getBody()->write(CharacterData::fromArray($locations));
        return $response->withHeader('Content-Type', 'application/json');
    }

    /**
     * 
     */
    public function character(ServerRequestInterface $request, ResponseInterface $response, array $args): ResponseInterface
    {
        $id = intval($args['id']);

        $character = $this->rickAndMortyUseCase->character($id);

        if (!$character) {
            $response->getBody()->write(Json::encode(['error' => 'Character not found']));
            return $response->withHeader('Content-Type', 'application/json')->withStatus(404);
        }

        $response->getBody()->write(CharacterData::toJson($character));
        return $response->withHeader('Content-Type', 'application/json');
    }
}
