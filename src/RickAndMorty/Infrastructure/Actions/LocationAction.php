<?php

namespace Src\RickAndMorty\Infrastructure\Actions;

use Nette\Utils\Json;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;

use Src\RickAndMorty\Infrastructure\Data\LocationData;
use Src\RickAndMorty\Apllication\Usecase\RickAndMortyUseCase;

class LocationAction
{
    /**
     * 
     */
    public function __construct(private RickAndMortyUseCase $rickAndMortyUseCase) {}

    /**
     * 
     */
    public function locations(ServerRequestInterface $request, ResponseInterface $response, array $args): ResponseInterface
    {
        $queryParams = $request->getQueryParams();
        $locations = $this->rickAndMortyUseCase->locations(...$queryParams);

        $response->getBody()->write(LocationData::fromArray($locations));
        return $response->withHeader('Content-Type', 'application/json');
    }

    /**
     * 
     */
    public function location(ServerRequestInterface $request, ResponseInterface $response, array $args): ResponseInterface
    {
        $id = intval($args['id']);

        $location = $this->rickAndMortyUseCase->location($id);

        if (!$location) {
            $response->getBody()->write(Json::encode(['error' => 'Location not found']));
            return $response->withHeader('Content-Type', 'application/json')->withStatus(404);
        }

        $response->getBody()->write(LocationData::toJson($location));
        return $response->withHeader('Content-Type', 'application/json');
    }
}
