<?php

namespace Metis;

use Interop\Container\ContainerInterface;
use Metis\Strategy\Random;
use Metis\Strategy\RoundRobin;
use Zend\Cache\StorageFactory;
use Zend\ServiceManager\Factory\FactoryInterface;
use Zend\ServiceManager\ServiceLocatorInterface;

class Factory implements FactoryInterface
{
    /**
     * {@inheritDoc}
     * @see \Zend\ServiceManager\Factory\FactoryInterface::__invoke()
     */
    public function __invoke(ContainerInterface $container, $requestedName, array $options = null)
    {
        $config = $container->get('config');
        $metisConfig = $config['metis'];
        $storageConfig = $metisConfig['storage'];
        $strategyName = $metisConfig['strategy'];

        if ($strategyName === 'random') {
            $strategy = new Random(null, $metisConfig);
        } elseif ($strategyName === 'round_robin') {
            $storage = StorageFactory::factory($storageConfig);
            $strategy = new RoundRobin($storage, $metisConfig);
        }

        return new Metis($strategy);
    }

    /**
     * {@inheritdoc}
     */
    public function createService(ServiceLocatorInterface $serviceLocator)
    {
        return $this($serviceLocator, Factory::class);
    }
}
