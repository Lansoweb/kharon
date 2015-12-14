<?php

namespace Metis;

use Zend\ServiceManager\FactoryInterface;
use Zend\ServiceManager\ServiceLocatorInterface;
use Zend\Cache\StorageFactory;
use Metis\Strategy\Random;
use Metis\Strategy\RoundRobin;

class Factory implements FactoryInterface
{
    /**
     * {@inheritdoc}
     */
    public function createService(ServiceLocatorInterface $serviceLocator)
    {
        $config = $serviceLocator->get('config');
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
}
