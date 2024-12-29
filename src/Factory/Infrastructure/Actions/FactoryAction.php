<?php

namespace Src\Factory\Infrastructure\Actions;

use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;

use Src\Factory\Application\Usecase\FactoryUseCase;

class FactoryAction
{
    /**
     * 
     */
    public function __construct(private FactoryUseCase $factoryUseCase) {}

    /**
     * 
     */
    public function home(ServerRequestInterface $request, ResponseInterface $response, array $args): ResponseInterface
    {
        $queryParams = $request->getQueryParams();

        $total = $queryParams['total'] ?? 20;
        $vehicles = $this->factoryUseCase->generateVehicles($total);

        $response->getBody()->write(json_encode($vehicles));
        return $response->withHeader('Content-Type', 'application/json');
    }
}
