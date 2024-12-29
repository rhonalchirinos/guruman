<?php

namespace Src\AbstractFactory\Infrastructure\Actions;

use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Src\AbstractFactory\Application\Usecase\AbstractFactoryUseCase;
use Src\Models\Vehicle;

class AbstractFactoryAction
{
    /**
     * 
     */
    public function __construct(private AbstractFactoryUseCase $abstractFactoryUseCase) {}

    /**
     * 
     */
    public function car(ServerRequestInterface $request, ResponseInterface $response, array $args): ResponseInterface
    {
        $queryParams = $request->getQueryParams();

        return $this->responseJson(
            $response,
            $this->abstractFactoryUseCase->createCar(
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
            $this->abstractFactoryUseCase->createMotorcycle(
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
            $this->abstractFactoryUseCase->createTruck(
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
