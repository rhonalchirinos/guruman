<?php

namespace Src\RickAndMorty\Infrastructure\Actions;

use Nette\Utils\Json;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;

use Src\RickAndMorty\Apllication\Usecase\RickAndMortyUseCase;
use Src\RickAndMorty\Infrastructure\Data\EpisodeData;

class EpisodeApiProxy
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
        $episodes = $this->rickAndMortyUseCase->episodes(...$queryParams);

        $response->getBody()->write(EpisodeData::fromArray($episodes));
        return $response->withHeader('Content-Type', 'application/json');
    }

    /**
     * 
     */
    public function location(ServerRequestInterface $request, ResponseInterface $response, array $args): ResponseInterface
    {
        $id = intval($args['id']);

        $episode = $this->rickAndMortyUseCase->episode($id);

        if (!$episode) {
            $response->getBody()->write(Json::encode(['error' => 'Episode not found']));
            return $response->withHeader('Content-Type', 'application/json')->withStatus(404);
        }

        $response->getBody()->write(EpisodeData::toJson($episode));
        return $response->withHeader('Content-Type', 'application/json');
    }
}
