<?php

use DI\Container;

use Psr\Container\ContainerInterface;

use Src\AbstractFactory\Application\Usecase\AbstractFactoryUseCase;
use Src\AbstractFactory\Infrastructure\Actions\AbstractFactoryAction;

use Src\Builder\Infrastructure\Actions\BuilderAction;
use Src\Builder\Application\Usecase\BuilderUseCase;

use Src\Factory\Application\Usecase\FactoryUseCase;
use Src\Factory\Infrastructure\Actions\FactoryAction;

use Src\RickAndMorty\Apllication\Usecase\RickAndMortyUseCase;
use Src\RickAndMorty\Infrastructure\Actions\LocationAction;
use Src\RickAndMorty\Infrastructure\Facade\LocationApiFacade;
use Src\RickAndMorty\Infrastructure\Proxy\LocationApiProxy;

use Nette\Bridges\Psr\PsrCacheAdapter;
use Nette\Caching\Storages\MemoryStorage;

use Psr\SimpleCache\CacheInterface;
use Src\RickAndMorty\Infrastructure\Actions\CharacterAction;
use Src\RickAndMorty\Infrastructure\Facade\CharacterApiFacade;
use Src\RickAndMorty\Infrastructure\Facade\EpisodeApiFacade;
use Src\RickAndMorty\Infrastructure\Proxy\CharacterApiProxy;
use Src\RickAndMorty\Infrastructure\Proxy\EpisodeApiProxy;

$container = new Container();

/**
 * 
 */
$container->set(
    CacheInterface::class,
    fn($container) =>  new PsrCacheAdapter(
        // new MemoryStorage()
        new Nette\Caching\Storages\FileStorage(__DIR__ . "/../cache")
    )
);


/**
 * FactoryAction
 */
$container->set(FactoryUseCase::class, fn($container) =>  new FactoryUseCase());
$container->set(FactoryAction::class, fn(ContainerInterface $container) =>  new FactoryAction($container->get(FactoryUseCase::class)));

/**
 * AbstractFactoryAction
 */
$container->set(AbstractFactoryUseCase::class, fn($container) =>  new AbstractFactoryUseCase());
$container->set(AbstractFactoryAction::class, fn(ContainerInterface $container) =>  new AbstractFactoryAction($container->get(AbstractFactoryUseCase::class)));

/**
 * BuilderAction
 */
$container->set(BuilderUseCase::class, fn($container) =>  new BuilderUseCase());
$container->set(BuilderAction::class, fn(ContainerInterface $container) =>  new BuilderAction($container->get(BuilderUseCase::class)));


/**
 *  Rick And Morty injections 
 */
$container->set(LocationApiProxy::class, fn($container) =>  new LocationApiProxy(new LocationApiFacade(), $container->get(CacheInterface::class)));
$container->set(CharacterApiProxy::class, fn($container) =>  new CharacterApiProxy(new CharacterApiFacade(), $container->get(CacheInterface::class)));
$container->set(EpisodeApiProxy::class, fn($container) =>  new EpisodeApiProxy(new EpisodeApiFacade(), $container->get(CacheInterface::class)));
$container->set(
    RickAndMortyUseCase::class,
    fn($container) => new RickAndMortyUseCase($container->get(LocationApiProxy::class), $container->get(CharacterApiProxy::class), $container->get(EpisodeApiProxy::class))
);

$container->set(
    LocationAction::class,
    fn(ContainerInterface $container) => new LocationAction($container->get(RickAndMortyUseCase::class))
);

$container->set(
    CharacterAction::class,
    fn(ContainerInterface $container) => new CharacterAction($container->get(RickAndMortyUseCase::class))
);
