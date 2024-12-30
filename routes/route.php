<?php

use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use Src\AbstractFactory\Infrastructure\Actions\AbstractFactoryAction;
use Src\Builder\Infrastructure\Actions\BuilderAction;
use Src\Factory\Infrastructure\Actions\FactoryAction;

$app->get(
    '/',
    function (Request $request, Response $response, $args) {

        $response->getBody()->write("Hello world rhonal!");
        return $response;
    }
);

$app->get('/factory', FactoryAction::class . ':home');

$app->post('/abstract-factory/car', AbstractFactoryAction::class . ':car');
$app->post('/abstract-factory/motocicle', AbstractFactoryAction::class . ':motocicle');
$app->post('/abstract-factory/truck', AbstractFactoryAction::class . ':truck');

$app->post('/builder/car', BuilderAction::class . ':car');
$app->post('/builder/motocicle', BuilderAction::class . ':motocicle');
$app->post('/builder/truck', BuilderAction::class . ':truck');

// $app->get('/rickandmorty/characters',);
//$app->get('/rickandmorty/locations',);

$app->get('/rickandmorty/locations/{id}', Src\RickAndMorty\Infrastructure\Actions\LocationAction::class . ':location');
$app->get('/rickandmorty/locations', Src\RickAndMorty\Infrastructure\Actions\LocationAction::class . ':locations');

$app->get('/rickandmorty/characters/{id}', Src\RickAndMorty\Infrastructure\Actions\CharacterAction::class . ':character');
$app->get('/rickandmorty/characters', Src\RickAndMorty\Infrastructure\Actions\CharacterAction::class . ':characters');

$app->get('/rickandmorty/episodes/{id}', Src\RickAndMorty\Infrastructure\Actions\EpisodeApiProxy::class . ':character');
$app->get('/rickandmorty/episodes', Src\RickAndMorty\Infrastructure\Actions\EpisodeApiProxy::class . ':characters');

// $app->get('/rickandmorty/episodes',);
