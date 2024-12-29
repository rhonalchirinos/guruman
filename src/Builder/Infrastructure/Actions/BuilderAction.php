<?php

namespace Src\Builder\Infrastructure\Actions;

use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Src\Builder\Application\Usecase\BuilderUseCase;
use Src\Models\Vehicle;

class BuilderAction
{
    /**
     * 
     */
    public function __construct(private BuilderUseCase $builderUseCase) {}

    /**
     * 
     */
    public function car(ServerRequestInterface $request, ResponseInterface $response, array $args): ResponseInterface
    {
        $queryParams = $request->getQueryParams();

        return $this->responseJson(
            $response,
            $this->builderUseCase->createCar(
                $queryParams['type'] ?? "compacto"
            )
        );
    }

    /**
     * 
     */
    public function motocicle(ServerRequestInterface $request, ResponseInterface $response, array $args): ResponseInterface
    {
        $queryParams = $request->getQueryParams();

        return $this->responseJson(
            $response,
            $this->builderUseCase->createMotorcycle(
                $queryParams['type'] ?? "urbana"
            )
        );
    }

    /**
     * 
     */
    public function truck(ServerRequestInterface $request, ResponseInterface $response, array $args): ResponseInterface
    {
        $queryParams = $request->getQueryParams();

        return $this->responseJson(
            $response,
            $this->builderUseCase->createTruck(
                $queryParams['type'] ?? "liviano"
            )
        );
    }

    /**
     * 
     */
    public function responseJson(ResponseInterface $response, Vehicle $vehicle)
    {
        $response->getBody()->write(json_encode($vehicle));
        return $response->withHeader('Content-Type', 'application/json');
    }
}
